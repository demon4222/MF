<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BouquetTypeRepository;
use App\Models\BouquetType;
use App\Validators\BouquetTypeValidator;

/**
 * Class BouquetTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BouquetTypeRepositoryEloquent extends BaseRepository implements BouquetTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BouquetType::class;
    }

    public function getSubTypesByTypeName($name)
    {
        $type = $this->find($name);
        return $type->bouquetsSubTypes()->get();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
