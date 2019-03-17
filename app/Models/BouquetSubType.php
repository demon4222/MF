<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BouquetSubType.
 *
 * @package namespace App\Models;
 */
class BouquetSubType extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'bouquet_sub_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function bouquetTypes(){
    	return $this->belongsTo(BouquetType::class, 'type_id');
    }

}
