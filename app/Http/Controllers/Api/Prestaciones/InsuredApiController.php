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
            'File_number' => 'required',
            'Subdependency_id'=> ['required'],
            'Rank_id'=> ['required'],
            'Start_date' => ['required','max:10','date'],
            'Work_place' => ['nullable','min:3','max:85'],
            'Register_motive' =>['nullable','min:3','max:120'],
            'Affiliate_status' => ['required'],
            'Observations' =>['nullable','min:5','max:180'],
            'Last_name_1' => ['required', 'min:2','max:20'],
            'Last_name_2' => ['required', 'min:2','max:20'],
            'Name' => ['required','min:2','max:30'],            
            'Birthday' => ['nullable','max:10','date'],
            'Birthplace' => ['nullable','min:3','max:85'],
            'Sex' => ['nullable'],
            'Marital_status' => ['nullable'],
            'Rfc' => ['required ',' max:13 ',' alpha_num:ascii','unique:insureds,rfc'],
            'Curp' => ['nullable' ,' max:18 ', 'alpha_num:ascii','unique:insureds,curp'],
            'Phone' => ['nullable','numeric','digits:10'],
            'Email' => ['nullable','email','min:5','max:50','unique:insureds,email'],
            'State' => ['nullable','min:5','max:85'],
            'County' => ['nullable','min:3','max:85'],
            'Neighborhood' => ['nullable','min:5','max:50'],
            'Roadway_type' => ['nullable','min:5','max:50'],
            'Street' =>['nullable','min:5','max:50'],
            'Outdoor_number' => ['nullable','max:7'],
            'Interior_number' => ['nullable','max:7'],
            'Cp' => ['nullable','numeric','digits:5'],
            'locality' => ['nullable','min:5','max:85'],
            'account_number' => ['nullable','digits:10','unique:insureds,account_number'],
            'Clabe' => ['nullable','digits:18','unique:insureds,clabe'],
            'Bank_id' => ['nullable'],
            'Representative_name' =>['nullable','max:40'],
            'Representative_rfc' =>['nullable ',' max:13 ',' alpha_num:ascii'],
            'Representative_curp' =>['nullable ',' max:18 ',' alpha_num:ascii'],
            'Representative_relationship' =>['nullable'],
        ]);
        // Si la validación falla
        if ($validator->fails()) {
            // Obtener los mensajes de error en el formato deseado
            //$errors = $validator->errors();
            $errores = $validator->errors()->toArray();

            // Retornar una respuesta con los errores en formato JSON
            return response()->json(['errors' => $errores]);
        }    
    
        // // Si la validación pasa, continua con el resto de tu lógica aquí
        // return response()->json(['Work_place' => $data->Work_place]);
    }
}

