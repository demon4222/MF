<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BouquetSize extends Model
{
	protected $table = 'bouquet_size';

	protected $fillable = ['bouquet_id', 'size_id','price'];

    public function price()
	{
	    return $this->price;
	}
	
	public $timestamps = false;
}
