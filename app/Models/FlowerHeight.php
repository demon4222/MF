<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class FlowerHeight extends Model implements Transformable
{
    use TransformableTrait;
    
    public function price()
	{
	    return $this->price;
    }
    
    protected $table = 'flower_height';

    protected $fillable = ['flower_id','height_id','price'];

    public $timestamps = false;
}
