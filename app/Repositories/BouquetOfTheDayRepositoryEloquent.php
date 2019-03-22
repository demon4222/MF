<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BouquetOfTheDayRepository;
use App\Models\BouquetOfTheDay;
use App\Validators\BouquetOfTheDayValidator;
use App\Repositories\BouquetRepositoryEloquent;
use Illuminate\Container\Container as Application;

/**
 * Class BouquetOfTheDayRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BouquetOfTheDayRepositoryEloquent extends BaseRepository implements BouquetOfTheDayRepository
{
    private $bouquetRepository;

    public function __construct(BouquetRepositoryEloquent $bouquetRepository, Application $app)
    {
        $this->bouquetRepository = $bouquetRepository;
        parent::__construct($app);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BouquetOfTheDay::class;
    }

    public function newBouquetofTheDay($req)
    {
        $bouquetOfTheDay = $this->findWhere(['bouquet_id' => $req->bouquet_id])->first();
        if($bouquetOfTheDay===null)
        {
            $this->model()::truncate();
            $this->create([
                'bouquet_id' => $req->bouquet_id,
                'discount' => $req->discount
            ]);
        }
        else{
            $this->model()::truncate();
            $this->create([
                'bouquet_id' => $req->bouquet_id,
                'discount' => $req->discount
            ]);
        }
        $bouquet = $this->bouquetRepository->findWhere(['bouquet_of_the_day' => 1])->first();
        // dd($bouquet);
        if($bouquet!==null)
        {
            $bouquet->bouquet_of_the_day = 0;
            $bouquet->save();
            $newBouquet = $this->bouquetRepository->find($req->bouquet_id);
            $newBouquet->bouquet_of_the_day = 1;
            $newBouquet->save();
            
        }
        else{
            $newBouquet = $this->bouquetRepository->find($req->bouquet_id);
            $newBouquet->bouquet_of_the_day = 1;
            $newBouquet->save();
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
