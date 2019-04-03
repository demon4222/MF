<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class HeadSlider.
 *
 * @package namespace App\Models;
 */
class HeadSlider extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
		"path_to_photo",
		"description",
		"button_text",
        "button_link"
	];

	public $timestamps = false;

}
