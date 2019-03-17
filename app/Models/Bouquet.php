<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Bouquet.
 *
 * @package namespace App\Models;
 */
class Bouquet extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name', 'sub_type_id','description'];

	  public function join(Size $size, Photo $photo)
     {
       $this->sizes()->attach($size, ['photo_id' => $photo->id]);
     }

     // public function sizes(){
     // 	return $this->belongsToMany('App\Size','bouquet_size')->withPivot('photo_id');;
     // }
     public function sizes()
     {
       return $this->belongsToMany('App\Models\Size')->withPivot(['price']);
     }

     public function addBouquet($req){
        
     }

     public $timestamps = false;

   //  public function sizes()
   //  {
   //      return new SizesRalation(
   //         (new Size())->newQuery(),
   //         $this,
   //         'bouquet_size',
   //         'bouquet_id',
   //         'size_id',
   //         'id',
   //         'id'
   //      );
   // }

}
