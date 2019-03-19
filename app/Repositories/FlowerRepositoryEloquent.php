<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FlowerRepository;
use App\Models\Flower;
use App\Models\FlowerHeight;
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
            
            FileUploadController::uploadFlowerPhoto($req->main_photo[$i],$flower->id,$height->id,'m');
            FileUploadController::uploadFlowerPhoto($req->hover_photo[$i],$flower->id,$height->id,'h');
        }

    }    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
