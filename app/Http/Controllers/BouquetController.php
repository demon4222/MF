<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BouquetSubType;
use App\Repositories\BouquetRepositoryEloquent as Bouquet;
use App\Repositories\SizeRepositoryEloquent as Size;
use App\Repositories\BouquetTypeRepositoryEloquent as BouquetType;
use App\Repositories\BouquetSizeRepositoryEloquent as BouquetSize;
use App\Models\FlowerCategory;
use App\Helpers\BouquetsFilter;

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

    public function show($slug, $size_id)
    {
        if (is_numeric($slug)) {
            // Get post for slug.
            $bouquet = $this->bouquetRepository->model()::findOrFail($slug);
            return redirect(route('bouquet.show', $bouquet->slug), 301);
        }
        // Get post for slug.
        $bouquet = $this->bouquetRepository->model()::whereSlug($slug)->firstOrFail();
        $sizes = $bouquet->sizes()->orderBy('count')->get();
        $add_sizes= collect();
        $i = 0;
        foreach($sizes as $size)
        {        
            $id = $size->id;
            $name = $size->size;
            $add_sizes->put($i, ['id' => $id, 'name'=>$name]);
            $i++;
        }
        $add_sizes = $add_sizes->all();
        $size = $bouquet->sizes->find($size_id);
        return view('layouts.show-bouquet',compact('bouquet','size','add_sizes'));
    }

	public function indexAdmin(){
        $bouquets = $this->bouquetRepository->paginate(15);
        $prices = $this->bouquetRepository->getPrices($bouquets);
		return view('layouts.admin.admin-all-bouquets', compact('bouquets','prices'));
    }

    public function getBouquetsByType($type_slug)
    {
        if (is_numeric($type_slug)) {
            // Get post for slug.
            $type = $this->bouquetTypeRepository->model()::findOrFail($type_slug);
            return redirect(route('types.index', $type->slug), 301);
        }
        // Get post for slug.
        $type = $this->bouquetTypeRepository->model()::whereSlug($type_slug)->firstOrFail();
        $bouquets = $type->bouquets()->paginate(15);
        $prices = $this->bouquetRepository->getPrices($bouquets);
        return view('layouts.all-bouquets', compact('bouquets','prices'));
    }

    public function getBouquetsBySubType($sub_type_slug)
    {
        if (is_numeric($sub_type_slug)) {
            // Get post for slug.
            $subType = BouquetSubType::findOrFail($sub_type_slug);
            return redirect(route('bouquets.bySubType', $subType->slug), 301);
        }
        // Get post for slug.
        $subType = BouquetSubType::whereSlug($sub_type_slug)->firstOrFail();
        $bouquets = $subType->bouquets()->paginate(15);
        $prices = $this->bouquetRepository->getPrices($bouquets);
        return view('layouts.all-bouquets', compact('prices','bouquets'));
    } 

    public function index(Request $request)
    {
        
        // \Cookie::queue('price_filter_box_3', 'checked', 10);
        //     \Cookie::queue('price_filter_val', 3, 10);
        $bouquets = (new BouquetsFilter($request))->apply();
        $prices = $this->bouquetRepository->getPrices($bouquets);
		return view('layouts.all-bouquets', compact('bouquets','prices'));
    }
    
    public function add(){
        
        $bouquetTypes = $this->bouquetTypeRepository->all();
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

    public function setOutOfStock($id)
    {
        $this->bouquetRepository->setOutOfStock($id);
        return back();
    }

    public function setInStock($id)
    {
        $this->bouquetRepository->setInStock($id);
        return back();
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
