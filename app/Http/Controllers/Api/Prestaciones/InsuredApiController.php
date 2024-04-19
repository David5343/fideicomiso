<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Insured;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Validator;

use function Psy\debug;

class InsuredApiController extends Controller
{
    public function index()
    {   
        $titulares = Insured::where('status','active')
                                ->latest()
                                ->limit(25)
                                ->get();
        return response()->json($titulares);
    }

    public function idgenerator()
    {
        $no_expediente = IdGenerator::generate(['table' => 'insureds','field' => 'file_number', 'length' => 8, 'prefix' =>'T']);
        $response["no_expediente"] = $no_expediente;
        return response()->json($response);
    }
    public function store(Request $request)
    {
        $response =["status"=>0,
                    "validaciones"=>""];
         $data =json_decode($request->getContent());
         $validator = Validator::make($request->all(), [
            'file_number' => 'required',
            'subdependency_id' => 'required',
            // Agrega más reglas de validación según tus necesidades
        ]);
    
        if ($validator->fails()) {
            // Aquí obtienes los mensajes de error de validación
            $errors = $validator->errors()->all();
    
            // Puedes manejar los errores como desees, como por ejemplo, devolverlos como respuesta JSON
            return response()->json(['errors' => $errors], 422);
        }
    
        // Si la validación pasa, continua con el resto de tu lógica aquí
    }
}

