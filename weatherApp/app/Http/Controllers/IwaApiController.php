<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IwaApiController extends Controller
{
    public function IwaData(){
        $data = Measurement::all();
        return response()->json($data, 200);
    }
}


