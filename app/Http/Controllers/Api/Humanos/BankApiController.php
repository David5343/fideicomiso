<?php

namespace App\Http\Controllers\Api\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;

class BankApiController extends Controller
{
    public function listar()
    {
        $query = Bank::where('status', 'active')->get();

        //$subdepe["subdependencias"] = $query;
        return response()->json($query);
    }
}
