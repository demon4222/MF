<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BouquetSize.
 *
 * @package namespace App\Models;
 */
class BouquetSize extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function price()
	{
	    return $this->price;
    }
    
    public function bouquets()
    {
        return $this->belongsToMany('App\Models\Bouquet','bouquet_size','bouquet_id');
    }

	public $timestamps = false;

    protected $table = 'bouquet_size';

	protected $fillable = ['bouquet_id', 'size_id','price'];

}


