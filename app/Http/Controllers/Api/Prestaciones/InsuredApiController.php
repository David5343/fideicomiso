<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Insured;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
        // $response =["status"=>0,
        //             "msg"=>""];
        // $data =json_decode($request->getContent());
        // if(isset($data->email)){
        //     $user = User::where('email',$data->email)->first();
        //     if($user){
        //         if(Hash::check($data->password,$user->password)){
        //             $token = $user->createToken($data->email);
        //             $response["status"] = 1;
        //             $response["token"] = $token->plainTextToken;
        //             $response["msg"] = "Inicio de Session exitoso.";
        //             $response["user"] = $user;
        //         }else{
        //             $response["msg"] = "Estas Credenciales no coinciden con nuestros registros.";
        //         }
        //     }else{
        //         $response["msg"] = "Usuario no encontrado.";
        //     }
            
        // }else{
        //     $response["msg"] = "Ingrese Parametros validos.";
        // }

        // return response()->json($response);
    }
}

