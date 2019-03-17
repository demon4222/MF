<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SizeWithPhotoPivot extends Pivot
{
   public function photo()
   {
        return $this->belongsTo(Photo::class, 'photo_id');
   }
}