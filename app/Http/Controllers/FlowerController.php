<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FlowerRepositoryEloquent as Flower;
use App\Models\FlowerCategory;

class FlowerController extends Controller
{
    private $flowerRepository;

    public function __construct(Flower $flowerRepository )
    {
        $this->flowerRepository = $flowerRepository;
    }

    public function indexAdmin()
    {
        $flowers = $this->flowerRepository->all();
        $prices = $this->flowerRepository->getPrices();
        return view('layouts.admin.admin-all-flowers', compact('flowers','prices'));
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
}
