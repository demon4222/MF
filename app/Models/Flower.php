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
        return $this->belongsToMany('App\Models\Height')->withPivot(['price']);
    }
    
    public function categories()
    {
        return $this->belongsTo('App\Models\FlowerCategory');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','name','flower_category_id', 'description'];

    public $timestamps = false;
}
