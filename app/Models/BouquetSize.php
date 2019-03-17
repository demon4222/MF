<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BouquetSize extends Model
{
	protected $table = 'bouquet_size';

    public function price()
	{
	    return $this->price;
	}
}
