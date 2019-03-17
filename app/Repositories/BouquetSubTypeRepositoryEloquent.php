<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BouquetSubTypeRepository;
use App\Models\BouquetSubType;
use App\Validators\BouquetSubTypeValidator;

/**
 * Class BouquetSubTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BouquetSubTypeRepositoryEloquent extends BaseRepository implements BouquetSubTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BouquetSubType::class;
    }

    public function findParentType($id)
    {
        return $this->find($id)->bouquetTypes()->first();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
