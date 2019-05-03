<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Bouquet.
 *
 * @package namespace App\Models;
 */
class Bouquet extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    protected $table = 'bouquets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name', 'sub_type_id','description','bouquet_of_the_day','inStock'];

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
     public function sizes()
     {
       return $this->belongsToMany('App\Models\Size')->withPivot(['price']);
     }

     public function hitsSlider()
     {
       return $this->hasOne('App\Models\HitsSlider');
     }

     public function subType()
     {
         return $this->belongsTo('App\Models\BouquetSubType');
     }

     public $timestamps = false;

}
