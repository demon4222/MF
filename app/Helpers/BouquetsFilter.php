<?php

namespace App\Helpers;
use App\Models\BouquetSize;
use App\Models\Bouquet;
use Illuminate\Support\Facades\DB;

class BouquetsFilter
{
    protected $builder;

    protected $request;

    protected $perPage = 2;

    public function __construct($request)
    {
        $this->builder = Bouquet::paginate(2);
        $this->request = $request; 
    }

    public function filters()
    {
        return $this->request->all();
    }

    public function apply()
    {
        foreach($this->filters() as $filter => $value)
        {
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function price_filter($value)
    {
        if($value==1)
        {
            $bouquetsSize = BouquetSize::where('price', '<=', 500)
                                                    ->groupBy('bouquet_id')
                                                    ->distinct()
                                                    ->get();
            $this->builder = $this->getBouquets($bouquetsSize);
        }
        if($value==2)
        {
            $bouquetsSize = \App\Models\BouquetSize::where('price', '>=', 501)
                                                    ->where('price','<=',1000)
                                                    ->groupBy('bouquet_id')
                                                    ->distinct()
                                                    ->get();
            $this->builder = $this->getBouquets($bouquetsSize);
        }
        if($value==3)
        {
            $bouquetsSize = \App\Models\BouquetSize::where('price', '>=', 1001)
                                                    ->where('price','<=',1500)
                                                    ->groupBy('bouquet_id')
                                                    ->distinct()
                                                    ->get();
            $this->builder = $this->getBouquets($bouquetsSize);
        }
        if($value==4)
        {
            $bouquetsSize = \App\Models\BouquetSize::where('price', '>=', 1501)
                                                    ->where('price','<=',2500)
                                                    ->groupBy('bouquet_id')
                                                    ->distinct()
                                                    ->get();
            $this->builder = $this->getBouquets($bouquetsSize);
        }
    }

    public function getBouquets($bouquetsSize)
    {
        $bouquetsId = [];
        foreach($bouquetsSize as $bouquetSize)
        {
            array_push($bouquetsId, $bouquetSize->bouquet_id);
        }
        return Bouquet::whereIn('id',$bouquetsId)->paginate(2);
    }
}