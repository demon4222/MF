<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BouquetRepositoryEloquent as Bouquet;
use App\Repositories\FlowerRepositoryEloquent as Flower;
use App\Models\BouquetSize;

class FilterController extends Controller
{
    private $bouquetRepository;

    private $flowerRepository;

    public function __construct(Bouquet $bouquetRepository, Flower $flowerRepository)
    {
        $this->bouquetRepository = $bouquetRepository;
        $this->flowerRepository = $flowerRepository;
    }

    public function bouquetsPrices(Request $request)
    {
        
        if($request->input('price_filter')==1){
            $bouquets = \App\Models\BouquetSize::where('price','<=',500)->get();
            dd($bouquets);
        }
        elseif($request->input('price_filter')==2){

        }
        elseif($request->input('price_filter')==3){

        }
        else{

        }
    }
}
