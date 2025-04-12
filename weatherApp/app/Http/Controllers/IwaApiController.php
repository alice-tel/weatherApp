<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IwaApiController extends Controller
{
    public function IwaData(){
        return response()->json(['message' => 'Hello, World!'], 200);
    }
}
