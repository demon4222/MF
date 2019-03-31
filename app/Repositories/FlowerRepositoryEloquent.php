<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FlowerRepository;
use App\Models\Flower;
use App\Models\FlowerHeight;
use App\Models\FlowerCategory;
use App\Validators\FlowerValidator;
use App\Repositories\HeightRepositoryEloquent;
use App\Repositories\FlowerHeightRepositoryEloquent;
use Illuminate\Container\Container as Application;
use App\Http\Controllers\FileUploadController;

/**
 * Class FlowerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FlowerRepositoryEloquent extends BaseRepository implements FlowerRepository
{
    private $height;

    private $flowerHeight;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Flower::class;
    }

    public function __construct(HeightRepositoryEloquent $height, FlowerHeightRepositoryEloquent $flowerHeight, Application $app)
    {
        $this->height = $height;
        $this->flowerHeight = $flowerHeight;
        parent::__construct($app);
    }
    
    public function createByReq($req)
    {
        
        $data = [
            'name' => mb_strtoupper($req->name),
            'flower_category_id' => $req->category,
            'description' => $req->description,
        ];
        $flower = $this->create($data);

        $heights_count = count($req->height);
        for($i = 0;$i<$heights_count; $i++)
        {
            $data = [
                'height' => $req->height[$i]
            ];
            $height = $this->height->firstOrCreate($data);

            $this->flowerHeight->create([
                'flower_id' => $flower->id,
                'height_id' => $height->id,
                'price' => $req->price[$i]
            ]);
        }
        FileUploadController::uploadFlowerPhoto($req->main_photo,$flower->id, 'm');
        FileUploadController::uploadFlowerPhoto($req->hover_photo,$flower->id, 'h');
    }   
    
    public function getForEdit($id)
    {
        $flower = $this->find($id);
        $heights = FlowerHeight::where('flower_id', $flower->id)->get();
        $flowerHeights = $flower->heights->toArray();
        $data = [
            'flower_id' => $flower->id,
            'category' => $flower->flower_category_id,
            'name' => $flower->name,
            'heights' =>$flowerHeights,
            'description' => $flower->description,
        ];
        return $data;
    }

    public function editByReq($req)
    {
        // dd($req->all());
        $flower = $this->find($req->flower_id);
        $data = [
            'name' => mb_strtoupper($req->name),
            'flower_category_id' => $req->category,
            'description' => $req->description,
        ];
        $this->update($data, $req->flower_id);
        $heights_exist_count = 0;
        if(isset($req->height_id))
        {
            $heights_exist_count = count($req->height_id);
            for($i = 0; $i < $heights_exist_count; $i++)
            {
                $data = [
                    'height' => $req->height[$i],
                ];
                $height = $this->height->findWhere($data)->first();
                if($height===null)
                {
                    $this->flowerHeight->deleteWhere([
                        'flower_id' => $flower->id,
                        'height_id' => $req->height_id[$i],
                    ]);
                    $newHeight = $this->height->create($data);
                    $this->flowerHeight->create([
                        'flower_id' => $flower->id,
                        'height_id' => $newHeight->id,
                        'price' => $req->price[$i]
                    ]);
                }
                else{
                    FlowerHeight::where('flower_id', $flower->id)
                                ->where('height_id',$height->id)
                                ->update(['price' => $req->price[$i]]);
                    
                }
            }
            if(isset($req->main_photo))
                FileUploadController::uploadFlowerPhoto($req->main_photo,$flower->id,'m');
            if(isset($req->hover_photo))
                FileUploadController::uploadFlowerPhoto($req->hover_photo,$flower->id,'h');
        }
    }

    public function getPrices($flowers)
    {
        $prices = collect();
        foreach($flowers as $flower)
        {
            $price = $flower->heights()->orderBy('height')->first()->pivot->price;
            $prices->put($flower->id, $price);
        }
        return $prices->all();
    }

    public function setInStock($id)
    {
        $this->update(['inStock' => 1],$id);
    }

    public function setOutOfStock($id)
    {
        $this->update(['inStock' => 0],$id);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
