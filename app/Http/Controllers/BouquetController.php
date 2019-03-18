<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BouquetsType;
use App\BouquetsSubType;
use App\Repositories\BouquetRepositoryEloquent as Bouquet;
use App\Repositories\SizeRepositoryEloquent as Size;
use App\Repositories\BouquetTypeRepositoryEloquent as BouquetType;

class BouquetController extends Controller
{
    private $bouquetRepository;

    private $bouquetTypeRepository;

    public function __construct(Bouquet $bouquetRepository, BouquetType $bouquetTypeRepository) {

        $this->bouquetRepository = $bouquetRepository;
        $this->bouquetTypeRepository = $bouquetTypeRepository;
    }

	public function indexAdmin(){
        $bouquets = $this->bouquetRepository->all();
        // dd($bouquets);
        // $bouquets = $this->bouquetRepository->with(['sizes'])->find(1);
        // dd($bouquets->sizes[0]);
		return view('layouts.admin.admin-all-products', compact('bouquets'));
    }
    
    public function add(){
        
        $bouquetTypes = $this->bouquetTypeRepository->all();
        // $bouquet = Bouquet::with('sizes')->find(1);
        //  dd($bouquet->sizes[0]->pivot->price=4);
    	return view('layouts.admin.admin-add-bouquet',compact('bouquetTypes'));
    }

    public function addRequest(Request $request){
        $this->bouquetRepository->createByReq($request);
    }

    public function edit($id){
        $bouquetData = $this->bouquetRepository->getForEdit($id);

        $bouquetTypes = $this->bouquetTypeRepository->all();
        return view('layouts.admin.admin-edit-bouquet', compact('bouquetData'),compact('bouquetTypes'));
    }

    public function editRequest(Request $req, $id)
    {
        $this->bouquetRepository->editByReq($id, $req);
        return $this->edit($id);
    }

}
