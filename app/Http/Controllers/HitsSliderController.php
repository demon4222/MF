<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HitsSliderRepositoryEloquent as HitsSlider;

class HitsSliderController extends Controller
{
    private $hitsSliderRepository;

    public function __construct(HitsSlider $hitsSliderRepository) {

        $this->hitsSliderRepository = $hitsSliderRepository;
    }

    public function indexAdmin()
    {
        $slides = $this->hitsSliderRepository->all();
        //dd($slides);
        $prices = $this->hitsSliderRepository->getPrices($slides);
        return view('layouts.admin.admin-hits-slider', compact('slides','prices'));
    }

    public function addBouquet($bouquet_id)
    {
        $this->hitsSliderRepository->addBouquet($bouquet_id);
        return back();
    }

    public function deleteSlide($slide_id)
    {
        $this->hitsSliderRepository->delete($slide_id);
        return back();
    }
}
