<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use App\Models\Prestaciones\Retiree;
use Illuminate\Http\Request;

class TicketApiController extends Controller
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
        $response['history'] = '';
        $response['retiree'] = '';
        $response['debug'] = '0';
        $titular = Insured::where('affiliate_status', 'Activo')
        ->where(function ($query) use ($dato) {
            $query->where('file_number', $dato)
                  ->orWhere('rfc', $dato)
                  ->orWhere('curp', $dato);
        })
        ->first();
        $familiar = Beneficiary::where('affiliate_status', 'Activo')
            ->where(function($query) use ($dato){
                $query->where('file_number', $dato)
                ->orwhere('rfc', $dato)
                ->orwhere('curp', $dato);
            })
            ->first();
            $retiree = Retiree::where('pension_status', 'ACTIVO')
            ->with(['pensionType', 'insured', 'beneficiary'])
            ->where('file_number', $dato)
            ->orwhere('noi_number', $dato)
            ->orWhereHas('insured', function ($query) use ($dato) {
                $query->where('file_number', $dato);
            })
            ->orWhereHas('insured', function ($query) use ($dato) {
                $query->where('rfc', $dato);
            })
            ->orWhereHas('insured', function ($query) use ($dato) {
                $query->where('curp', $dato);
            })
            ->orWhereHas('beneficiary', function ($query) use ($dato) {
                $query->where('file_number', $dato);
            })
            ->orWhereHas('beneficiary', function ($query) use ($dato) {
                $query->where('rfc', $dato);
            })
            ->orWhereHas('beneficiary', function ($query) use ($dato) {
                $query->where('curp', $dato);
            })
            ->first();
        if ($titular != null) {
            $response['status'] = 'success';
            $response['insured'] = $titular;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } elseif ($familiar != null) {
            $response['status'] = 'success';
            $response['beneficiary'] = $familiar;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        } 
        elseif ($retiree != null) {
            $response['status'] = 'success';
            $response['retiree'] = $retiree;
            $codigo = 200;

            return response()->json($response, status: $codigo);
        }
        else {

            $response['status'] = 'fail';
            $response['message'] = 'Registro no encontrado';
            $codigo = 200;

            return response()->json($response, status: $codigo);
        }
    }
}
