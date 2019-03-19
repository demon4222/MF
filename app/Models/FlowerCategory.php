<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlowerCategory extends Model
{
    protected $table = 'flower_categories';

    protected $fillable = ['name'];
}
