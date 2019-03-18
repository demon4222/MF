<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BouquetSizeRepository;
use App\Models\BouquetSize;
use App\Validators\BouquetSizeValidator;

/**
 * Class BouquetSizeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BouquetSizeRepositoryEloquent extends BaseRepository implements BouquetSizeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BouquetSize::class;
    }

    public function deleteSize($sizeId, $bouquetId)
    {
        $size = $this->deleteWhere(['size_id' => $sizeId, 'bouquet_id' => $bouquetId]);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
