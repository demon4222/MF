<?php

namespace App\Models;
use App\Models\Bouquet;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class BouquetSubType.
 *
 * @package namespace App\Models;
 */
class BouquetSubType extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    protected $table = 'bouquet_sub_types';

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

    public function bouquetTypes(){
    	return $this->belongsTo(BouquetType::class, 'type_id');
    }

    public function bouquets()
    {
        return $this->hasMany(Bouquet::class, 'sub_type_id');
    }

}
