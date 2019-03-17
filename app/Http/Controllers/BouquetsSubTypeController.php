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
    	// $objBouquetType = BouquetsType::where('name',$request->typeName)->first();
		// $subTypes = $objBouquetType->bouquetsSubTypes()->get(); 


		// $subTypes = $this->bouquetTypeRepository->getSubTypesByTypeName($request->name);
		// $subTypes = $this->bouquetTypeRepository->findByField('name','Композиції')->first();
		//$subTypes = $this->getSubTypesByTypeName('Композиції')->first();
		$subTypes = $this->bouquetTypeRepository->getSubTypesByTypeName($request->typeName);
    	$types = collect();
    	foreach ($subTypes as $subType) {  		
    		$types->push($subType);
    	}

    	return response()->json(['subTypes' => $types]);
    }
}
