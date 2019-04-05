<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BouquetRepositoryEloquent as Bouquet;
use App\Repositories\BouquetOfTheDayRepositoryEloquent as BouquetOfTheDay;

class BouquetOfTheDayController extends Controller
{
    private $bouquetOfTheDayRepository;

    private $bouquetRepository;

    public function __construct(Bouquet $bouquetRepository, BouquetOfTheDay $bouquetOfTheDayRepository) {
        $this->bouquetOfTheDayRepository = $bouquetOfTheDayRepository;

        $this->bouquetRepository = $bouquetRepository;
    }

    public function addBouquetOfTheDay(Request $req)
    {
        $this->bouquetOfTheDayRepository->newBouquetofTheDay($req);
        return redirect()->route('admin.all-bouquets');
    }
}
