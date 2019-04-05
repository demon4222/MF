<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class BouquetType.
 *
 * @package namespace App\Models;
 */
class BouquetType extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    public $timestamps = false;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $table = 'bouquet_types';

    public function bouquetsSubTypes()
    {
        return $this->hasMany(BouquetSubType::class, 'type_id');
    }

    public function bouquets()
    {
        return $this->hasManyThrough(Bouquet::class, BouquetSubType::class, 'type_id', 'sub_type_id');
    }
}
