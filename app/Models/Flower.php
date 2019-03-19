<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Flower.
 *
 * @package namespace App\Models;
 */
class Flower extends Model implements Transformable
{
    use TransformableTrait;

    public function heights()
    {
        $this->belobgsToMany('App\Models\Height');
    }
    
    public function categories()
    {
        $this->belongsTo('App\Models\FlowerCategory');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name','flower_category_id'];

    public $timestamps = false;
}
