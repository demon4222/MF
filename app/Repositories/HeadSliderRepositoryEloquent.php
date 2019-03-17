<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HeadSliderRepository;
use App\Models\HeadSlider;
use App\Validators\HeadSliderValidator;
use App\Http\Controllers\FileUploadController;

/**
 * Class HeadSliderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HeadSliderRepositoryEloquent extends BaseRepository implements HeadSliderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HeadSlider::class;
    }

    public function createByReq($req)
    {
        $data = [
    		"path_to_photo" => '0',
    		"description" => $req->description,
    		"button_text" => $req->button_text,
        ];
        $slide = $this->create($data);
        $path = '/media/head-slider/'. $slide->id . '.jpg';
        $this->update(['path_to_photo'=>$path],$slide->id);
        FileUploadController::uploadHeadSlide($req->photo,$slide->id);
    }

    public function changeButtonText($id, $text)
    {
        $data = ['button_text' => $text];
        $this->update($data, $id);
    }

    public function changePhoto($id, $photo)
    {
        FileUploadController::uploadHeadSlide($photo,$id);

        $data = ['path_to_photo' => '/media/head-slider/'.$id.'.jpg'];
        $this->update($data, $id);
    }
    
    public function deleteSlide($id)
    {
        FileUploadController::deleteHeadSlide($id);
        $this->delete($id);
    }

    public function changeText($id, $text)
    {
        $this->update(['description'=>$text],$id);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
