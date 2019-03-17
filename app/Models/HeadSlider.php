<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadSlider extends Model
{
	protected $fillable = [
		"path_to_photo",
		"description",
		"button_text"
	];

	public $timestamps = false;

    public static function showAll(){
    	return static::all();
    }

    public static function showToEditById($slide_id){
    	$objHeadSlider = new HeadSlider();
    	$head_slider = $objHeadSlider->where('id',$slide_id)->first();
    	return $head_slider;
    }

    public static function changeButton(){
    	$objHeadSlider = new HeadSlider();
    	$head_slider = $objHeadSlider->where('id',$slide_id)->first();
    }

    public static function createSlide($data)
    {
    	$objHeadSlider = new HeadSlider();
    	$objHeadSlider->create([
    		"path_to_photo" => '/media/head-slider/'.$data->photo->getClientOriginalName(),
    		"description" => $data->description,
    		"button_text" => $data->button_text,
    	]);
    }
}
