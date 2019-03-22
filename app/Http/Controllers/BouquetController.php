<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BouquetsType;
use App\BouquetsSubType;
use App\Repositories\BouquetRepositoryEloquent as Bouquet;
use App\Repositories\SizeRepositoryEloquent as Size;
use App\Repositories\BouquetTypeRepositoryEloquent as BouquetType;
use App\Repositories\BouquetSizeRepositoryEloquent as BouquetSize;

class BouquetController extends Controller
{
    private $bouquetRepository;

    private $bouquetTypeRepository;

    private $bouquetSizeRepository;

    public function __construct(Bouquet $bouquetRepository,
     BouquetType $bouquetTypeRepository, BouquetSize $bouquetSizeRepository) {

        $this->bouquetRepository = $bouquetRepository;
        $this->bouquetTypeRepository = $bouquetTypeRepository;
        $this->bouquetSizeRepository = $bouquetSizeRepository;
    }

	public function indexAdmin(){
        $bouquets = $this->bouquetRepository->all();
        $prices = $this->bouquetRepository->getPrices();
		return view('layouts.admin.admin-all-bouquets', compact('bouquets','prices'));
    }
    
    public function add(){
        
        $bouquetTypes = $this->bouquetTypeRepository->all();
        // $bouquetPrices = $this->
        // $bouquet = Bouquet::with('sizes')->find(1);
        //  dd($bouquet->sizes[0]->pivot->price=4);
    	return view('layouts.admin.admin-add-bouquet',compact('bouquetTypes'));
    }

    public function addRequest(Request $request){
        $this->bouquetRepository->createByReq($request);
        return redirect()->action(
            'BouquetController@indexAdmin'
        );
    }

    public function edit($id){
        $bouquetData = $this->bouquetRepository->getForEdit($id);

        $bouquetTypes = $this->bouquetTypeRepository->all();
        return view('layouts.admin.admin-edit-bouquet', compact('bouquetData'),compact('bouquetTypes'));
    }

    public function editRequest(Request $req, $id)
    {
        $this->bouquetRepository->editByReq($id, $req);
        return redirect()->action(
            'BouquetController@indexAdmin'
        );
    }

    public function delete($id)
    {
        $this->bouquetRepository->deleteBouquet($id);
        return back();
    }

    public function addBouquetOfTheDay($bouquet_id, $discount)
    {
        $this->bouquetRepository->newBouquetofTheDay($bouquet_id);
        return back();
    }

}
