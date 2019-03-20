<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FlowerHeightRepositoryEloquent as FlowerHeight;

class FlowerHeightController extends Controller
{
    private $flowerHeightRepository;

    public function __construct(FlowerHeight $flowerHeightRepository) {

        $this->flowerHeightRepository = $flowerHeightRepository;
    }

    public function deleteHeight($flower_id, $height_id)
    {
        $this->flowerHeightRepository->deleteHeight($height_id, $flower_id);
        return back();
    }
}