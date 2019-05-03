<?php

namespace App\Http\Controllers;

use App\Repositories\BouquetOfTheDayRepositoryEloquent as BouquetOfTheDay;
use App\Repositories\HitsSliderRepositoryEloquent as HitsSlider;
use App\Repositories\HeadSliderRepositoryEloquent as HeadSlider;
use App\Repositories\BouquetTypeRepositoryEloquent as Type;

class HomeController extends Controller
{
    private $bouquetOfTheDayRepository;

    private $hitsSliderRepository;

    private $headSliderRepository;

    private $typesRepository;

    public function __construct(HeadSlider $headSliderRepository,
     HitsSlider $hitsSliderRepository, BouquetOfTheDay $bouquetOfTheDayRepository, Type $typesRepository)
    {
        $this->typesRepository = $typesRepository;
        $this->bouquetOfTheDayRepository = $bouquetOfTheDayRepository;
        $this->hitsSliderRepository = $hitsSliderRepository;
        $this->headSliderRepository = $headSliderRepository;
    }
    /**
     * Home page
     */
    public function index()
    {
        $head_slides = $this->headSliderRepository->all();
        $hits_slides = $this->hitsSliderRepository->all();
        $hits_slides_prices = $this->hitsSliderRepository->getPrices($hits_slides);
        $bouquetOfTheDay = $this->bouquetOfTheDayRepository->getForHome();
        return view('home', compact('head_slides','hits_slides','hits_slides_prices','bouquetOfTheDay'));
    }

}
