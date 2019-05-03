<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
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

    public function getSubTypesByTypeId($id)
    {
        $type = $this->find($id);
        return $type->bouquetsSubTypes()->get();
    }

    public function getBySlug($slug)
    {
        return $this->model()::whereSlug($slug)->firstOrFail();
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
