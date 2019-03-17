<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Input;
use App\Repositories\HeadSliderRepositoryEloquent as HeadSlider;

class HeadSliderController extends Controller
{
    private $headSliderRepository;

    public function __construct(HeadSlider $headSliderRepository)
    {
        $this->headSliderRepository = $headSliderRepository;
    }

    public function index(){
    	$head_slides = $this->headSliderRepository->all();
		return view('layouts.admin.admin-head-slider',['head_slides' => $head_slides]);
    }

    public function show($id){
    	$slide = $this->headSliderRepository->find($id);
		return view('layouts.admin.admin-head-slide-edit',compact('slide'));
    }

    public function changeButton($id,Request $req){
        $this->headSliderRepository->changeButtonText($id, $req->button_text);
        return $this->show($id);
    }

    public function changePhoto($id,Request $req){
        $this->headSliderRepository->changePhoto($id, $req->photo);
        return $this->show($id);
    }

    public function changeText($id,Request $req){
        $this->headSliderRepository->changeText($id, $req->description);
        return $this->show($id);
    }

    public function add(){
        return view('layouts.admin.admin-head-slide-add');
    }

    public function addRequest(Request $req){
        $this->headSliderRepository->createByReq($req);
        return $this->index();
    }

    public function delete($id){
        $slide = $this->headSliderRepository->deleteSlide($id);
        return $this->index();
    }

    public function edit(){
    	
    }
}
