<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Height.
 *
 * @package namespace App\Models;
 */
class Height extends Model implements Transformable
{
    use TransformableTrait;

    public function flowers()
    {
        $this->belobgsToMany('App\Models\Flower');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['height'];

    public $timestamps = false;

}
