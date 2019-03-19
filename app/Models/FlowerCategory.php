<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlowerCategory extends Model
{
    protected $table = 'flower_categories';

    protected $fillable = ['name'];
}
