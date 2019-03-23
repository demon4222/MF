<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BouquetsType;
use App\Repositories\BouquetTypeRepositoryEloquent as BouquetType;

class BouquetTypeController extends Controller
{
    private $typesRepository;

    public function __construct(BouquetType $typesRepository)
    {
        $this->typesRepository = $typesRepository;
    }

}
