<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Validators\BouquetValidator;
use Illuminate\Container\Container as Application;
use App\Models\Bouquet;
use App\Http\Controllers\FileUploadController;
use App\Models\HitsSlider;

/**
 * Class BouquetRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BouquetRepositoryEloquent extends BaseRepository implements BouquetRepository
{
    private $size;

    private $subType;

    private $bouquetSize;

    public function __construct(BouquetSubTypeRepositoryEloquent $subType,
    SizeRepositoryEloquent $size, BouquetSizeRepositoryEloquent $bouquetSize, Application $app)
    {
        $this->size = $size;
        $this->subType = $subType;
        $this->bouquetSize = $bouquetSize;
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
            "name"        => mb_strtoupper($req->name),
            "sub_type_id" => mb_strtoupper($req->subType),
    		"description" => $req->description,
        ];
        $bouquet = $this->create($data);

        $sizes_count = count($req->size_name);
        for($i=0; $i<$sizes_count; $i++)
        {
            $data = [
                "size" => mb_strtoupper($req->size_name[$i]),
                "count"    => $req->size_count[$i],
                "diameter" => $req->size_diameter[$i],
                "height"   => $req->size_height[$i],
            ];
            $size = $this->size->firstOrCreate($data);
            $this->bouquetSize->create([
                'bouquet_id'=> $bouquet->id,
                'size_id'   => $size->id,
                'price'     => $req->price[$i],
            ]);

            FileUploadController::uploadBouquetPhoto($req->main_photo[$i],$bouquet->id,$size->id,'m');
            FileUploadController::uploadBouquetPhoto($req->hover_photo[$i],$bouquet->id,$size->id,'h');
            FileUploadController::uploadBouquetPhoto($req->add_photo[$i],$bouquet->id,$size->id,'a');
            FileUploadController::uploadGeneralBouquetPhoto($req->general_photo,$bouquet->id,'g');
            FileUploadController::uploadGeneralBouquetPhoto($req->general_photo_hover,$bouquet->id,'gh');
        }
    }

    public function getPrices($bouquets)
    {
        $prices = collect();
        foreach($bouquets as $bouquet)
        {
            $price = $bouquet->sizes()->orderBy('count')->first()->pivot->price;
            $prices->put($bouquet->id, $price);
        }
        return $prices->all();
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
        return $data;
    }

    public function editByReq($id, $req)
    {
        $bouquet = $this->find($id);
        $data = [
            'name' => mb_strtoupper($req->name),
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
                    "size" => mb_strtoupper($req->size_name[$i]),
                    "count"    => $req->size_count[$i],
                    "diameter" => $req->size_diameter[$i],
                    "height"   => $req->size_height[$i],
                ];
                $size = $this->size->findWhere($data)->first();
                if($size===null)
                {
                    $this->bouquetSize->deleteWhere([
                        'bouquet_id' => $bouquet->id,
                        'size_id' => $req->size_id[$i],
                    ]);
                    $newSize = $this->size->create($data);
                    $this->bouquetSize->create([
                        'bouquet_id'=> $id,
                        'size_id'   => $newSize->id,
                        'price'     => $req->price[$i],
                    ]);
                    if(isset($req->main_photo[$i]))
                        FileUploadController::uploadBouquetPhoto($req->main_photo[$i],$bouquet->id,$$newSize->id,'m');
                    if(isset($req->hover_photo[$i]))
                        FileUploadController::uploadBouquetPhoto($req->hover_photo[$i],$bouquet->id,$newSize->id,'h');
                    if(isset($req->add_photo[$i]))
                        FileUploadController::uploadBouquetPhoto($req->add_photo[$i],$bouquet->id,$newSize->id,'a');
                }
                else{
                    $bouquetSize_id = $this->bouquetSize->findWhere([
                        'bouquet_id'=>$bouquet->id,
                        'size_id'=>$size->id
                    ])->first()->id;
                    $this->bouquetSize->update(['price' => $req->price[$i]],$bouquetSize_id);
                    if(isset($req->main_photo[$i]))
                        FileUploadController::uploadBouquetPhoto($req->main_photo[$i],$bouquet->id,$size->id,'m');
                    if(isset($req->hover_photo[$i]))
                        FileUploadController::uploadBouquetPhoto($req->hover_photo[$i],$bouquet->id,$size->id,'h');
                    if(isset($req->add_photo[$i]))
                        FileUploadController::uploadBouquetPhoto($req->add_photo[$i],$bouquet->id,$size->id,'a');
                }
            }
            if(isset($req->general_photo))    
                FileUploadController::uploadGeneralBouquetPhoto($req->general_photo,$bouquet->id,'g');
            if(isset($req->general_photo_hover))
                FileUploadController::uploadGeneralBouquetPhoto($req->general_photo_hover,$bouquet->id,'gh');
        }
        $sizes_new_count = count($req->size_name) - $sizes_exist_count;
        if($sizes_new_count!==0)
        {
            for($i=$sizes_exist_count; $i<$sizes_new_count+$sizes_exist_count; $i++)
            {
                $data = [
                    "size" => mb_strtoupper($req->size_name[$i]),
                    "count"    => $req->size_count[$i],
                    "diameter" => $req->size_diameter[$i],
                    "height"   => $req->size_height[$i],
                ];

                $newSize = $this->size->firstOrCreate($data);
                $this->bouquetSize->updateOrCreate([
                    'bouquet_id'=> $id,
                    'size_id'   => $newSize->id,
                    'price'     => $req->price[$i],
                ]);

                if(isset($req->main_photo[$i]))
                    FileUploadController::uploadBouquetPhoto($req->main_photo[$i],$bouquet->id,$newSize->id,'m');
                if(isset($req->hover_photo[$i]))
                    FileUploadController::uploadBouquetPhoto($req->hover_photo[$i],$bouquet->id,$newSize->id,'h');
                if(isset($req->add_photo[$i]))
                    FileUploadController::uploadBouquetPhoto($req->add_photo[$i],$bouquet->id,$newSize->id,'a');
                if(isset($req->general_photo))
                    FileUploadController::uploadGeneralBouquetPhoto($req->general_photo,$bouquet->id,'g');
                    if(isset($req->general_photo))
                    FileUploadController::uploadGeneralBouquetPhoto($req->general_photo_hover,$bouquet->id,'gh');
            }
        }
        
    }

    public function getBySlug($slug)
    {
        return $this->model()::whereSlug($slug)->firstOrFail();
    }

    public function deleteBouquet($id)
    {
        $bouquetSizes = $this->bouquetSize->findWhere(['bouquet_id'=>$id]);
        foreach($bouquetSizes as $bouquetSize)
        {
            FileUploadController::deleteBouquetsPhoto($id, $bouquetSize->size_id);
        }
        $slide = HitsSlider::where('bouquet_id', $id)->first();
        if($slide!==null)
        {
            $slide->delete();
        }
        $this->bouquetSize->deleteWhere(['bouquet_id'=>$id]);
        $this->delete($id);
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
