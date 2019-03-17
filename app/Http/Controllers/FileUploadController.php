<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public static function uploadHeadSlide($file){
    	$file->move(public_path() . '/media/head-slider',$file->getClientOriginalName());
    }
}
