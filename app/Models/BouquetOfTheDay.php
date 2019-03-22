<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BouquetOfTheDay.
 *
 * @package namespace App\Models;
 */
class BouquetOfTheDay extends Model implements Transformable
{
    use TransformableTrait;

    public function bouquet()
    {
        return $this->belongsTo('App\Models\Bouquet', 'bouquet_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bouquet_id', 'discount'];

    protected $table = 'bouquet_of_the_day';

    public $timestamps = false;
}
