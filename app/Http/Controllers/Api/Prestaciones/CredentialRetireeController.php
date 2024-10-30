<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\CredentialRetiree;
use Illuminate\Http\Request;

class CredentialRetireeController extends Controller
{
    public function index()
    {
        $pensionados = CredentialRetiree::with('retiree')
            ->latest()
            ->limit(25)
            ->get();

        return response()->json($pensionados);
    }
}
