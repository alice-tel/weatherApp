<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\CriteriumType;
use App\Models\Query;
use Illuminate\Support\Facades\Log;

class ContractTestController extends Controller
{
    public function show()
    {
        $contracts = Query::all();
        $contract = $contracts->first()->getStationsFromQuery();

//        Log::info($contract);

//        $id =  Query::getQueryFromID(6)->changeDescription("Better");
//        $id = print_r($contract, true); // print_r($contract, true);

        return $contract;  //view('contract.contractPage', compact('id'));
        return view('contract.contractPage', compact('id'));
    }
}
