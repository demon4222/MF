<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SizesRalation extends BelongsToMany
{
   // Указываем список доп. полей, которые будут загружены
   protected $pivotColumns = ['photo_id'];
   public function newPivot(array $attributes = [], $exists = false)
   {
       $pivot = new SizeWithPhotoPivot( $attributes, $this->table, $exists);

        return $pivot->setPivotKeys('bouquet_id', 'size_id');
   }
   public function get($columns = ['*'])
    {
        $sizes = parent::get($columns);

        // Получаем список всех объектов UserWithRolePivot
        $pivots = $sizes->map(function ($size) {
            return $size->pivot;
        })->load('photo');

        return $sizes;
    }
}
