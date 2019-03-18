<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BouquetSizeRepositoryEloquent as BouquetSize;

class BouquetSizeController extends Controller
{
    private $bouquetSizeRepository;

    public function __construct(BouquetSize $bouquetSizeRepository) {

        $this->bouquetSizeRepository = $bouquetSizeRepository;
    }

    public function deleteSize($sizeId, $bouquetId)
    {
        $this->bouquetSizeRepository->deleteSize($sizeId, $bouquetId);
        return back();
    }
}
