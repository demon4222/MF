<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SizeRepository;
use App\Models\Size;
use App\Validators\SizeValidator;

/**
 * Class SizeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SizeRepositoryEloquent extends BaseRepository implements SizeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Size::class;
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
