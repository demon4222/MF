<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class FlowerCategory extends Model
{
    use Sluggable;

    protected $table = 'flower_categories';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function flowers()
    {
        return $this->hasMany('App\Models\Flower');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
