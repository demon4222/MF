<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HitsSliderRepository;
use App\Models\HitsSlider;
use App\Validators\HitsSliderValidator;

/**
 * Class HitsSliderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HitsSliderRepositoryEloquent extends BaseRepository implements HitsSliderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HitsSlider::class;
    }

    public function getPrices($slides)
    {
        $prices = collect();
        foreach($slides as $slide)
        {
            $price = $slide->bouquet->sizes()->orderBy('count')->first()->pivot->price;
            $prices->put($slide->id, $price);
        }
        return $prices->all();
    }

    public function addBouquet($bouquet_id)
    {
        if($this->findWhere(['bouquet_id' => $bouquet_id])->first()!==null)
        {
            
        }
        else
        {
            $this->create(['bouquet_id' => $bouquet_id]);
        }
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
