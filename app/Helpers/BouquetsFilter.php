<?php

namespace App\Helpers;
use App\Models\BouquetSize;
use App\Models\Bouquet;

class BouquetsFilter
{
    protected $builder;

    protected $request;

    protected $perPage = 15;

    public function __construct($request)
    {
        $this->builder = Bouquet::paginate($this->perPage);
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
        if($value<0||$value>6||!is_numeric($value))
            return;

        $bouquetsSize = null;
        if($value==1){
            $bouquetsSize = $this->getPivotTable(0,500);
        }
        else if($value==2){
            $bouquetsSize = $this->getPivotTable(501,1000);
        }
        else if($value==3){
            $bouquetsSize = $this->getPivotTable(1001,1500);
        }
        else if($value==4){
            $bouquetsSize = $this->getPivotTable(1501,2000);
        }
        else if($value==5){
            $bouquetsSize = $this->getPivotTable(2001,3000);
        }
        else if($value==6){
            $bouquetsSize = $this->getPivotTable(3001,4000);
        }

        $this->builder = $this->getBouquets($bouquetsSize);
    }

    public function getPivotTable($min, $max)
    {
        return BouquetSize::where('price', '>=', $min)
            ->where('price','<=',$max)
            ->groupBy('bouquet_id')
            ->distinct()
            ->get();
    }

    public function getBouquets($bouquetsSize)
    {
        $bouquetsId = [];
        foreach($bouquetsSize as $bouquetSize)
        {
            array_push($bouquetsId, $bouquetSize->bouquet_id);
        }
        return Bouquet::whereIn('id',$bouquetsId)->paginate($this->perPage);
    }
}
