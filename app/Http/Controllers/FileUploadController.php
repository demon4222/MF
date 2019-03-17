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

    /* types - 'main', 'hover', 'add'*/
    public static function uploadBouquetPhoto($file, $bouquet_id, $size_id, $type)
    {
        $pathToDirectory = public_path() . '/media/bouquets/';
        if(file_exists( $pathToDirectory . $bouquet_id . '_' . $size_id . '_' . $type . '.jpg'))
            unlink($pathToDirectory . $bouquet_id . '_' . $size_id . '_' . $type . '.jpg');

        $file->move($pathToDirectory, $bouquet_id . '_' . $size_id . '_' . $type . '.jpg');
    }
}
