<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FlowerRepositoryEloquent as Flower;

class FlowerController extends Controller
{
    private $flowerRepository;

    public function __construct(Flower $flowerRepository )
    {
        $this->flowerRepository = $flowerRepository;
    }

    public function indexAdmin()
    {
        return view('layouts.admin.admin-all-flowers');
    }
    public function add()
    {
        return view('layouts.admin.admin-add-flower');
    }
    public function addRequest(Request $request)
    {   
        
        $this->flowerRepository->createByReq($request);
        return $this->indexAdmin();
    }
}
