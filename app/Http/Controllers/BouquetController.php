<?php

namespace App\Http\Controllers;

use App\Models\HitsSlider;
use App\Models\BouquetOfTheDay;
use Illuminate\Http\Request;
use App\Models\BouquetSubType;
use App\Repositories\BouquetRepositoryEloquent as Bouquet;
use App\Repositories\BouquetTypeRepositoryEloquent as BouquetType;
use App\Repositories\BouquetSizeRepositoryEloquent as BouquetSize;
use App\Helpers\BouquetsFilter;
use NotificationChannels\Telegram\TelegramServiceProvider;

class BouquetController extends Controller
{
    private $bouquetRepository;

    private $bouquetTypeRepository;

    private $bouquetSizeRepository;

    public function __construct(Bouquet $bouquetRepository,
                                BouquetType $bouquetTypeRepository, BouquetSize $bouquetSizeRepository)
    {

        $this->bouquetRepository = $bouquetRepository;
        $this->bouquetTypeRepository = $bouquetTypeRepository;
        $this->bouquetSizeRepository = $bouquetSizeRepository;
    }

    public function show($slug, $size_id)
    {
        $bouquet = $this->bouquetRepository->getBySlug($slug);
        $add_sizes = $this->bouquetSizeRepository->getAddSizesForBouquetShowPage($bouquet);
        $size = $bouquet->sizes->find($size_id);
        return view('layouts.show-bouquet', compact('bouquet', 'size', 'add_sizes'));
    }

    public function indexAdmin()
    {
        $bouquets = $this->bouquetRepository->paginate(15);
        $prices = $this->bouquetRepository->getPrices($bouquets);
        return view('layouts.admin.admin-all-bouquets', compact('bouquets', 'prices'));
    }

    public function getBouquetsByType($type_slug, Request $request)
    {
        $type = $this->bouquetTypeRepository->getBySlug($type_slug);
        $bouquets = $type->bouquets();
        $bouquets = (new BouquetsFilter($bouquets, $request))->apply();
        $prices = $this->bouquetRepository->getPrices($bouquets);
        return view('layouts.all-bouquets', compact('bouquets', 'prices'));
    }

    public function getBouquetsBySubType($sub_type_slug, Request $request)
    {
        $subType = BouquetSubType::whereSlug($sub_type_slug)->firstOrFail();
        $bouquets = $subType->bouquets();
        $bouquets = (new BouquetsFilter($bouquets, $request))->apply();
        $prices = $this->bouquetRepository->getPrices($bouquets);
        return view('layouts.all-bouquets', compact('prices', 'bouquets'));
    }

    public function index(Request $request)
    {
        $bouquets = new \App\Models\Bouquet;
        $bouquets = (new BouquetsFilter($bouquets, $request))->apply();
        $prices = $this->bouquetRepository->getPrices($bouquets);
        return view('layouts.all-bouquets', compact('bouquets', 'prices'));
    }

    public function add()
    {
        $bouquetTypes = $this->bouquetTypeRepository->all();
        return view('layouts.admin.admin-add-bouquet', compact('bouquetTypes'));
    }

    public function addRequest(Request $request)
    {
        $this->bouquetRepository->createByReq($request);
        return redirect()->action(
            'BouquetController@indexAdmin'
        );
    }

    public function edit($id)
    {
        $bouquetData = $this->bouquetRepository->getForEdit($id);

        $bouquetTypes = $this->bouquetTypeRepository->all();
        return view('layouts.admin.admin-edit-bouquet', compact('bouquetData','bouquetTypes'));
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
        HitsSlider::where(['bouquet_id' => $id])->delete();
        BouquetOfTheDay::where(['bouquet_id' => $id])->delete();
        $this->bouquetRepository->deleteBouquet($id);
        return back();
    }

    public function addBouquetOfTheDay($bouquet_id, $discount)
    {
        $this->bouquetRepository->newBouquetofTheDay($bouquet_id);
        return back();
    }

}
