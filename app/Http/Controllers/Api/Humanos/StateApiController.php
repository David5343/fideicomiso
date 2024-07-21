<?php

namespace App\Http\Controllers\Api\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\State;
use Illuminate\Http\Request;

class StateApiController extends Controller
{
    public function listar()
    {
        $query = State::where('status','active')->get();
        //$response["subdependencias"] = $query;
        return response()->json($query);
    }
}
