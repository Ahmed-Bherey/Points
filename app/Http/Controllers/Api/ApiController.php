<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //
    public function clientApiId($id){
        $clients = Client::find($id);
        return response()->json($clients);
    }
}
