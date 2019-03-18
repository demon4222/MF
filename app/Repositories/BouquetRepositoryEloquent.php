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
use App\Repositories\BouquetSubTypeRepositoryEloquent;

/**
 * Class BouquetRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BouquetRepositoryEloquent extends BaseRepository implements BouquetRepository
{
    private $size;

    private $subType;

    public function __construct(BouquetSubTypeRepositoryEloquent $subType,
    SizeRepositoryEloquent $size,Application $app)
    {
        $this->size = $size;
        $this->subType = $subType;
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

    public function getForEdit($id)
    {
        
        $bouquet = $this->find($id);
        $subTypeId = $bouquet->sub_type_id;        
        $subType = $this->subType->find($subTypeId);
        $type = $this->subType->findParentType($subTypeId);      
        $bouquetSizes = $bouquet->sizes->toArray();
        $data = [
            'name' => $bouquet->name,
            'id' => $id,
            'typeName' => $type->name,
            'typeId' => $type->id,
            'subTypeName' => $subType->name,
            'subTypeId' => $subTypeId,
            'description' => $bouquet->description,
            'sizes' => $bouquetSizes,
        ];
        
        // foreach($data['sizes'] as $size)
        // {
        //     // dd($data['id'].$size['id']);
        // }
    
        return $data;

    }

    public function editByReq($id, $req)
    {
        $bouquet = $this->find($id);
        $data = [
            'name' => $req->name,
            'sub_type_id' => $req->subType,
            'description' => $req->description,
        ];
        $this->update($data, $id);
        $sizes_exist_count = 0;
        if(isset($req->size_id))
        {
            $sizes_exist_count = count($req->size_id);
            for($i=0; $i<$sizes_exist_count; $i++)
            {
                $data = [
                    "size" => $req->size_name[$i],
                    "count"    => $req->size_count[$i],
                    "diameter" => $req->size_diameter[$i],
                    "height"   => $req->size_height[$i],
                ];
                $size = $this->size->findWhere($data);
                if($size->first()===null)
                {
                    $newSize = $this->size->create($data);
                    BouquetSize::create([
                        'bouquet_id'=> $id,
                        'size_id'   => $newSize->id,
                        'price'     => $req->price[$i],
                    ]);
                }
            }
        }
        $sizes_new_count = count($req->size_name) - $sizes_exist_count;
        if($sizes_new_count!==0)
        {
            for($i=$sizes_exist_count; $i<$sizes_new_count+$sizes_exist_count; $i++)
            {
                $data = [
                    "size" => $req->size_name[$i],
                    "count"    => $req->size_count[$i],
                    "diameter" => $req->size_diameter[$i],
                    "height"   => $req->size_height[$i],
                ];

                $newSize = $this->size->firstOrCreate($data);
                BouquetSize::updateOrCreate([
                    'bouquet_id'=> $id,
                    'size_id'   => $newSize->id,
                    'price'     => $req->price[$i],
                ]);
            }
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
