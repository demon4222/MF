<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class HitsSlider.
 *
 * @package namespace App\Models;
 */
class HitsSlider extends Model implements Transformable
{
    use TransformableTrait;

    public function bouquet()
    {
        return $this->belongsTo('App\Models\Bouquet','bouquet_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bouquet_id'];

    protected $table = 'hits_slider';

    public $timestamps = false;
}
