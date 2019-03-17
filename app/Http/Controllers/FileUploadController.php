<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public static function uploadHeadSlide($file,$id){
        $pathToDirectory = public_path() . '/media/head-slider/';
        if(file_exists( $pathToDirectory . $id . '.jpg'))
            unlink($pathToDirectory . $id . '.jpg');

    	$file->move($pathToDirectory, $id . '.jpg');
    }

    public static function deleteHeadSlide($id){
        $pathToDirectory = public_path() . '/media/head-slider/';
        if(file_exists( $pathToDirectory . $id . '.jpg'))
            unlink($pathToDirectory . $id . '.jpg');
    }
}
