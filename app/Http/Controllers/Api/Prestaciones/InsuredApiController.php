<?php

namespace App\Http\Controllers\Api\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\Insured;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function busqueda(Request $request)
    {
        $data = $request->json()->all();
        $parametro = $data['parametro'];
        $busqueda = $data['search'];
        $codigo = 0;
        $response['status'] ="fail";
        $response['errors'] =[];
        $response['insured'] =[];
        $response['debug'] ="0";

            switch ($parametro) {
                    case 'RFC':
                        $fila = Insured::where('rfc',$busqueda)->first();
                        if($fila != null){
                            $response['insured'] = [$fila];
                            $response['status'] ="success";
                            $codigo = 200;
                        } else{
                            //$codigo = 404;
                            $codigo = 200;
                        }                       
                        break;
                        case 'No. de Expediente':
                            $fila = Insured::where('file_number',$busqueda)->first();
                            if($fila != null){
                                $response['insured'] = [$fila];
                                $response['status'] ="success";
                                $codigo = 200;
                            } else{
                                //$codigo = 404;
                                $codigo = 200;
                            } 
                        break;
                        case 'CURP':
                            $fila = Insured::where('curp',$busqueda)->first();
                            if($fila != null){
                                $response['insured'] = [$fila];
                                $response['status'] ="success";
                                $codigo = 200;
                            } else{
                                //$codigo = 404;
                                $codigo = 200;
                            }  
                                break;                 
                        default:
                    # code...
                    break;
            }
            return response()->json($response,status:$codigo);
    }
    public function buscarPorId(Request $request)
    {
        $data = $request->json()->all();
        $id = $data['id'];
        $codigo = 0;
        $response['status'] ="fail";
        $response['errors'] =[];
        $response['insured'] =[];
        $response['debug'] ="0";

        $fila = Insured::find($id);
        if(empty($fila)){
            if(!empty($fila->subdependency_id)){
                $fila->subdependency_name = $fila->subdependency->name;
            }
            if(empty($fila->rank_id)){
                $fila->rank_name ="NO DISPONIBLE";
                
            }else{
                $fila->rank_name = $fila->rank->name;
            }
            if($fila->bank_id !=null){

                $fila->bank_name = $fila->bank->name;
            }
            if($fila->beneficiaries !=null)
            {
                $fila->fam = $fila->beneficiaries;
            }
            $response['insured'] = $fila;          
            $response['status'] ="success";
            $codigo = 200;
        } else{
            //$codigo = 404;
            $codigo = 200;
        } 
        return response()->json($response,status:$codigo);
    }
    public function idgenerator()
    {
        $no_afiliacion = IdGenerator::generate(['table' => 'insureds','field' => 'file_number', 'length' => 8, 'prefix' =>'T']);
        $response["no_afiliacion"] = $no_afiliacion;
        return response()->json($response);
    }
    public function store(Request $request)
    {
        $response['status'] ="0";
        $response['errors'] ="0";
        $response['insured'] ="0";
        $response['debug'] ="0";
         $rules =[
            'File_number' => 'required|max:8|unique:insureds,file_number',
            'Subdependency_id'=> 'required|numeric|min:1',
            'Rank_id'=> 'required|numeric|min:0',
            'Start_date' => 'required|date|max:10',
            'Work_place' =>'nullable|min:3|max:85',
            'Register_motive' =>'nullable|min:3|max:120',
            'Affiliate_status' => 'required|not_in:Elije...',
            'Observations' =>'nullable|min:5|max:180',
            'Last_name_1' => 'required|min:2|max:20',
            'Last_name_2' => 'required|min:2|max:20',
            'Name' => 'required|min:2|max:30',            
            'Birthday' => 'nullable|max:10|date',
            'Birthplace' => 'nullable|min:3|max:85',
            'Sex' => 'required',
            'Marital_status' => 'nullable',
            'Rfc' => 'required|max:13|alpha_num:ascii|unique:insureds,rfc',
            'Curp' => 'nullable| max:18 |alpha_num:ascii|unique:insureds,curp',
            'Phone' => 'nullable|numeric|digits:10',
            'Email' => 'nullable|email|min:5|max:50|unique:insureds,email',
            'State' => 'nullable|min:5|max:85',
            'County' => 'nullable|min:3|max:85',
            'Neighborhood' => 'nullable|min:5|max:50',
            'Roadway_type' => 'nullable|min:5|max:50',
            'Street' =>'nullable|min:5|max:50',
            'Outdoor_number' => 'nullable|max:7',
            'Interior_number' => 'nullable|max:7',
            'Cp' => 'nullable|numeric|digits:5',
            'locality' => 'nullable|min:5|max:85',
            'account_number' => 'nullable|digits:10|unique:insureds,account_number',
            'Clabe' => 'nullable','digits:18','unique:insureds,clabe',
            'Bank_id' => 'nullable',
            'Representative_name' =>'nullable|max:40',
            'Representative_rfc' =>'nullable | max:13|alpha_num:ascii',
            'Representative_curp' =>'nullable | max:18|alpha_num:ascii',
            'Representative_relationship' =>'nullable',
        ];
        $validator = Validator::make($request->all(),$rules);
        // Comprobar si la validación falla
        if ($validator->fails()) {
            // Retornar errores de validación
            $response['errors'] = $validator->errors()->toArray();
            //$response['debug'] = $request->all();
            return response()->json($response, 200);
        }

        // Si la validación pasa, continua con el resto de tu lógica aquí
         DB::beginTransaction();
         try
         {

            $titular = new Insured();
            $titular->file_number = Str::of($request->input('File_number'))->trim();
             $titular->subdependency_id = $request->input('Subdependency_id');
             $titular->rank_id = $request->input('Rank_id');
             $titular->start_date =$request->input('Start_date');
             $titular->work_place = Str::of($request->input('Work_place'))->trim();
             $titular->register_motive = Str::of($request->input('Register_motive'))->trim();
             $titular->affiliate_status = $request->input('Affiliate_status');
             $titular->observations = Str::of($request->input('Observations'))->trim();
             $titular->last_name_1 = Str::of($request->input('Last_name_1'))->trim();
             $titular->last_name_2 = Str::of($request->input('Last_name_2'))->trim();
             $titular->name = Str::of($request->input('Name'))->trim();
             $titular->birthday = $request->input('Birthday');
             $titular->birthplace = Str::of($request->input('Birthplace'))->trim();
             $titular->sex = $request->input('Sex');
             $titular->marital_status = $request->input('Marital_status');
             $rfc = Str::of($request->input('Rfc'))->trim();
             $titular->rfc = Str::upper($rfc);
             $curp = Str::of($request->input('Curp'))->trim();
             $titular->curp = Str::upper($curp);
             $titular->phone = Str::of($request->input('Phone'))->trim();
             $email = Str::of($request->input('Email'))->trim();
             $titular->email = Str::lower($email);
             $titular->state = Str::of($request->input('State'))->trim();
             $titular->county = Str::of($request->input('County'))->trim();
             $titular->neighborhood = Str::of($request->input('Neighborhood'))->trim();
             $titular->roadway_type = Str::of($request->input('Roadway_type'))->trim();
             $titular->street = Str::of($request->input('Street'))->trim();
             $titular->outdoor_number = Str::of($request->input('Outdoor_number'))->trim();
             $titular->interior_number = Str::of($request->input('Interior_number'))->trim();
             $titular->cp = Str::of($request->input('Cp'))->trim();
             $titular->locality = Str::of($request->input('Locality'))->trim();
             $titular->account_number = Str::of($request->input('Account_number'))->trim();
             $titular->clabe = Str::of($request->input('Clabe'))->trim();
             $titular->bank_id = $request->input('Bank_id');
             $titular->representative_name = Str::of($request->input('Representative_name'))->trim();
             $titular->representative_rfc = Str::of($request->input('Representative_rfc'))->trim();
             $titular->representative_curp = Str::of($request->input('Representative_curp'))->trim();
             $titular->representative_relationship = Str::of($request->input('Representative_relationship'))->trim();
             $titular->status = 'active';
             $titular->modified_by = Auth::user()->email;
             //sleep(1);
             $titular->save();
            DB::commit();
            $response['status'] ="1";
            $response['insured'] =$titular->file_number;
            return response()->json($response, 200);
         }catch(Exception $e){
             DB::rollBack();
             $response['debug'] =$e->getMessage(); 
             
         }         

    }
}

