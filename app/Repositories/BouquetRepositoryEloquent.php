<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BouquetRepository;
use App\Models\Bouquet;
use App\Validators\BouquetValidator;
use App\Repositories\SizeRepositoryEloquent;
use Illuminate\Container\Container as Application;
use App\Models\BouquetSize;
use App\Http\Controllers\FileUploadController;


/**
 * Class BouquetRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BouquetRepositoryEloquent extends BaseRepository implements BouquetRepository
{
    private $size;

    public function __construct(SizeRepositoryEloquent $size,Application $app)
    {
        $this->size = $size;

        parent::__construct($app);
    }
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bouquet::class;
    }

    public function createByReq($req)
    {
        $data = [
            "name"        => $req->name,
            "sub_type_id" => $req->subType,
    		"description" => $req->description,
        ];
        $bouquet = $this->create($data);

        $sizes_count = count($req->size_name);
        for($i=0; $i<$sizes_count; $i++)
        {
            $data = [
                "size" => $req->size_name[$i],
                "count"    => $req->size_count[$i],
                "diameter" => $req->size_diameter[$i],
                "height"   => $req->size_height[$i],
            ];
            $size = $this->size->firstOrCreate($data);
            BouquetSize::create([
                'bouquet_id'=> $bouquet->id,
                'size_id'   => $size->id,
                'price'     => $req->price[$i],
            ]);

            FileUploadController::uploadBouquetPhoto($req->main_photo[$i],$bouquet->id,$size->id,'m');
            FileUploadController::uploadBouquetPhoto($req->hover_photo[$i],$bouquet->id,$size->id,'h');
            FileUploadController::uploadBouquetPhoto($req->add_photo[$i],$bouquet->id,$size->id,'a');

        }

        // FileUploaderController::uploadBouquetPhoto($)

    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
