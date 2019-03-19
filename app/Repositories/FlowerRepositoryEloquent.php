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

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Flower::class;
    }

    public function __construct(HeightRepositoryEloquent $height, Application $app)
    {
        $this->height = $height;
        parent::__construct($app);
    }

    public function createByReq($req)
    {
        
        $data = [
            'name' => $req->name,
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

            FlowerHeight::create([
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
        dd($req->all());
        $flower = $this->find($req->flower_id);
        $data = [
            'name' => mb_strtoupper($req->name),
            'flower_category_id' => $req->category,
            'description' => $req->description,
        ];
        $this->update($data, $id);
        $heights_exist_count = 0;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
