<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\BouquetsSubType;
use App\Repositories\BouquetTypeRepositoryEloquent as BouquetType;

class BouquetsSubTypeController extends Controller
{
	private $bouquetTypeRepository;

    public function __construct(BouquetType $bouquetTypeRepository) {

        $this->bouquetTypeRepository = $bouquetTypeRepository;
    }

    public function getSubTypes(Request $request){
		$subTypes = $this->bouquetTypeRepository->getSubTypesByTypeId($request->typeName);
    	$types = collect();
    	foreach ($subTypes as $subType) {  		
    		$types->push($subType);
    	}

    	return response()->json(['subTypes' => $types]);
    }
}
