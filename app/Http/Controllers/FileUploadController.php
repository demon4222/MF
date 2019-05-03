<?php

namespace App\Http\Controllers;

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

    /* types - 'main'(m), 'hover'(h), 'add'(a)*/
    public static function uploadBouquetPhoto($file, $bouquet_id, $size_id, $type)
    {
        $pathToDirectory = public_path() . '/media/bouquets/' . $bouquet_id . '/';
        if(file_exists( $pathToDirectory . $size_id . '_' . $type . '.jpg'))
            unlink($pathToDirectory . $size_id . '_' . $type . '.jpg');

        $file->move($pathToDirectory, $size_id . '_' . $type . '.jpg');
    }
    /* types - 'general'(g), 'genera hover'(gh)*/
    public static function uploadGeneralBouquetPhoto($file, $bouquet_id,$type)
    {
        $pathToDirectory = public_path() . '/media/bouquets/' . $bouquet_id . '/';
        if(file_exists( $pathToDirectory . $type . '.jpg'))
            unlink($pathToDirectory  . $type . '.jpg');

        $file->move($pathToDirectory, $type . '.jpg');
    }

    public static function deleteBouquetsPhoto($bouquet_id, $size_id)
    {
        $pathToDirectory = public_path() . '/media/bouquets/' . $bouquet_id . '/' ;
        if(file_exists( $pathToDirectory . $size_id . '_m' . '.jpg'))
            unlink( $pathToDirectory . $size_id . '_m' . '.jpg' );
        if(file_exists( $pathToDirectory . $size_id . '_h' . '.jpg'))
            unlink( $pathToDirectory . $size_id . '_h' . '.jpg' ); 
        if(file_exists( $pathToDirectory . $size_id . '_a' . '.jpg'))
            unlink( $pathToDirectory . $size_id . '_a' . '.jpg' );
        if(file_exists( $pathToDirectory . 'g' . '.jpg'))
            unlink( $pathToDirectory . 'g' . '.jpg' );
        if(file_exists( $pathToDirectory . 'gh' . '.jpg'))
            unlink( $pathToDirectory . 'gh' . '.jpg' );
        if (is_dir($pathToDirectory)) {
            rmdir($pathToDirectory);
        }
    }

    public static function uploadFlowerPhoto($file, $flower_id, $type)
    {
        $pathToDirectory = public_path() . '/media/flowers/' . $flower_id . '/';
        if(file_exists($pathToDirectory . $type . '.jpg'))
            unlink($pathToDirectory . $type . '.jpg');
            
        $file->move($pathToDirectory,  $type . '.jpg' );
    }

    public static function deleteFlowerPhoto($flower_id)
    {
        $pathToDirectory = public_path() . '/media/flowers/' . $flower_id . '/';
        if(file_exists( $pathToDirectory . 'm' . '.jpg'))
            unlink( $pathToDirectory . 'm' . '.jpg' );
        if(file_exists( $pathToDirectory . 'h' . '.jpg'))
            unlink( $pathToDirectory . 'h' . '.jpg' );
    }
}
