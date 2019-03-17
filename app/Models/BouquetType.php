<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BouquetType.
 *
 * @package namespace App\Models;
 */
class BouquetType extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function bouquetsSubTypes(){
    	return $this->hasMany(BouquetSubType::class,'type_id');
    }

    public function bouquets(){
    	return $this->hasManyThrough(Bouquet::class, BouquetsSubType::class,'type_id','sub_type_id');
    }
}
