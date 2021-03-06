<?php

namespace App\Repositories;

use App\Http\Controllers\FileUploadController;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FlowerHeightRepository;
use App\Models\FlowerHeight;
use App\Validators\FlowerHeightValidator;

/**
 * Class FlowerHeightRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FlowerHeightRepositoryEloquent extends BaseRepository implements FlowerHeightRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FlowerHeight::class;
    }

    public function deleteHeight($height_id, $flower_id)
    {
        $this->deleteWhere(['flower_id' => $flower_id, 'height_id' => $height_id]);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function deleteFlower($id)
    {
        $flowerHeights = $this->flowerHeight->deleteWhere(['flower_id'=>$id]);
        FileUploadController::deleteFlowerPhoto($id);
        $this->delete($id);
    }
    
}
