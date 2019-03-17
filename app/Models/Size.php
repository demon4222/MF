<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Size.
 *
 * @package namespace App\Models;
 */
class Size extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['size','count','diameter','height'];

    public function bouquets(){
    	return $this->belongsToMany('App\Models\Bouquet');
    }

    public $timestamps = false;

}

