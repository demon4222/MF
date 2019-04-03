<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FlowerRepositoryEloquent as Flower;
use App\Models\FlowerCategory;
use App\Models\BouquetType;

class FlowerController extends Controller
{
    private $flowerRepository;

    public function __construct(Flower $flowerRepository )
    {
        $this->flowerRepository = $flowerRepository;
    }

    public function index()
    {
        $flowers = $this->flowerRepository->paginate(15);
        $prices = $this->flowerRepository->getPrices($flowers);
        return view('layouts.all-flowers', compact('flowers','prices'));
    }

    public function indexAdmin()
    {
        $flowers = $this->flowerRepository->paginate(15);
        $prices = $this->flowerRepository->getPrices($flowers);
        return view('layouts.admin.admin-all-flowers', compact('flowers','prices'));
    }

    public function show($slug, $height_id)
    {
        if (is_numeric($slug)) {
            // Get post for slug.
            $flower = $this->flowerRepository->model()::findOrFail($slug);
            return redirect(route('flower.show', $flower->slug), 301);
        }
        // Get post for slug.
        $flower = $this->flowerRepository->model()::whereSlug($slug)->firstOrFail();

        $heights = $flower->heights()->orderBy('height')->get();
        $add_heights = collect();
        $i = 0;
        foreach($heights as $height)
        {        
            $id = $height->id;
            $name = $height->height;
            $add_heights->put($i, ['id' => $id, 'name'=>$name]);
            $i++;
        }
        $add_heights = $add_heights->all();
        $height = $flower->heights->find($height_id);
        return view('layouts.show-flower', compact('flower','height','add_heights'));
    }

    public function add()
    {
        $categories = FlowerCategory::all();
        return view('layouts.admin.admin-add-flower', compact('categories'));
    }
    public function addRequest(Request $request)
    {          
        $this->flowerRepository->createByReq($request);
        return redirect()->action(
            'FlowerController@indexAdmin'
        );
    }

    public function getForEdit($id)
    {
        $data = $this->flowerRepository->getForEdit($id);
        $categories = FlowerCategory::all();

        return view('layouts.admin.admin-edit-flower', compact('data'),compact('categories'));
    }

    public function editRequest(Request $req)
    {
        $this->flowerRepository->editByReq($req);
        return redirect()->action(
            'FlowerController@indexAdmin'
        );
    }

    public function setOutOfStock($id)
    {
        $this->flowerRepository->setOutOfStock($id);
        return back();
    }

    public function setInStock($id)
    {
        $this->flowerRepository->setInStock($id);
        return back();
    }


    public function getFlowersByCategory($slug)
    {
        if (is_numeric($slug)) {
            // Get post for slug.
            $category = FlowerCategory::findOrFail($slug);
            return redirect(route('flowers.byCategory', $category->slug), 301);
        }
        // Get post for slug.
        $category = FlowerCategory::whereSlug($slug)->firstOrFail();
        $flowers = $category->flowers()->paginate(15);
        $prices = $this->flowerRepository->getPrices($flowers);
        
        return view('layouts.all-flowers', compact('flowers','prices'));
    }
}
