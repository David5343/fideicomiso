<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use Illuminate\Http\Request;

class RetireeApiController extends Controller
{
    public function busqueda(Request $request)
    {
        $dato = $request->dato;
        $codigo = 0;
        $response['status'] = 'fail';
        $response['message'] = '';
        $response['errors'] = '';
        $response['insured'] = '';
        $response['beneficiary'] = '';
        $response['debug'] = '0';
        $titular = Insured::where('affiliate_status', 'Baja')
            ->where('inactive_motive','Pensión')
            ->where('id', $dato)
            ->orwhere('file_number', $dato)
            ->orwhere('rfc', $dato)
            ->orwhere('curp', $dato)
            ->orwhere('name', 'like', '%'.$dato.'%')
            ->orwhere('last_name_1', 'like', '%'.$dato.'%')
            ->orwhere('last_name_2', 'like', '%'.$dato.'%')
            ->get();
        if ($titular->isEmpty()) {
            $familiar = Beneficiary::where('affiliate_status', 'Baja')
                ->where('inactive_motive','Pensión')
                ->where('id', $dato)
                ->orwhere('file_number', $dato)
                ->orwhere('rfc', $dato)
                ->orwhere('curp', $dato)
                ->orwhere('name', 'like', '%'.$dato.'%')
                ->orwhere('last_name_1', 'like', '%'.$dato.'%')
                ->orwhere('last_name_2', 'like', '%'.$dato.'%')
                ->get();
            $response['status'] = 'success';
            $response['beneficiary'] = $familiar;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } else {

            $response['status'] = 'success';
            $response['insured'] = $titular;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        }
    }

    public function store(Request $request)
    {
        $titular = new Insured();
        $familiar = new Beneficiary();
        if ($request->input('Insured_type') == 'Titular') {

        } elseif ($request->input('Insured_type') == 'Familiar') {

        }
    }
}
