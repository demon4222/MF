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

    public function getAddSizesForBouquetShowPage($bouquet)
    {
        $sizes = $bouquet->sizes()->orderBy('count')->get();
        $add_sizes = collect();
        $i = 0;
        foreach ($sizes as $size) {
            $id = $size->id;
            $name = $size->size;
            $add_sizes->put($i, ['id' => $id, 'name' => $name]);
            $i++;
        }
        $add_sizes = $add_sizes->all();
        return $add_sizes;
    }

    public function deleteSize($sizeId, $bouquetId)
    {
        $this->deleteWhere(['size_id' => $sizeId, 'bouquet_id' => $bouquetId]);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
