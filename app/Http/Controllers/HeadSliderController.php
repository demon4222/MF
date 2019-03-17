<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HeadSliderController extends Controller
{
    /* Show all head-slides */
    public function index(){
    	$head_slides = App\HeadSlider::showAll();
		return view('layouts.admin.admin-head-slider',['head_slides' => $head_slides]);
    }
    /*show slide to edit by id in Admin Panel*/
    public function show($id){
    	$slide = App\HeadSlider::showToEditById($id);
		return view('layouts.admin.admin-head-slide-edit',compact('slide'));
    }
    /*Changes slide button and redirect to edit slide menu*/
    public function changeButton($id,Request $req){
        $slide = App\HeadSlider::find($id);
        $slide->button_text = $req->button_text;
        $slide->save();
        return $this->index();
    }
    /*Changes slide photo and redirect to edit slide menu*/
    public function changePhoto($id,Request $req){
        FileUploadController::uploadHeadSlide($req->photo);
        $slide = App\HeadSlider::find($id);
        if(file_exists( public_path().$slide->path_to_photo))
            unlink(public_path($slide->path_to_photo));
        $slide->path_to_photo = '/media/head-slider/'.$req->photo->getClientOriginalName();
        $slide->save();
        return $this->show($id);
    }
    /*Changes slide text and redirect to edit slide menu*/
    public function changeText($id,Request $req){

        $slide = App\HeadSlider::find($id);
        $slide->photo = $req->button_text;
        $slide->save();
    }
    /*Show adding page*/
    public function add(){
        return view('layouts.admin.admin-head-slide-add');
    }
    /*Creates new slide*/
    public function addRequest(Request $req){
        FileUploadController::uploadHeadSlide($req->photo);
        App\HeadSlider::createSlide($req);
        return $this->index();
    }

    public function delete($id){
        $slide = App\HeadSlider::find($id);
        if(file_exists( public_path().$slide->path_to_photo))
            unlink(public_path($slide->path_to_photo));
        $slide->delete();
        return $this->index();
    }

    public function edit(){
    	
    }
}
