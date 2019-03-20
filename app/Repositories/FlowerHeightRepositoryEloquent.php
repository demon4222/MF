<?php

namespace App\Repositories;

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

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}