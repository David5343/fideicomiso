<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Area;
use App\Models\Humanos\Bank;
use App\Models\Humanos\Category;
use App\Models\Humanos\County;
use App\Models\Humanos\Employee;
use App\Models\Humanos\EmployeeFamily;
use App\Models\Humanos\Place;
use App\Models\Humanos\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('humanos.empleados.index');
    }
    public function create()
    {
        $select1 = Area::where('status', 'active')->get();
        $select2 = Place::where('status', 'active')->get();
        $select3 = State::where('status', 'active')->get();
        $select4 = County::where('status', 'active')->get();
        $select5 = Bank::where('status', 'active')->get();
        return  view('humanos.empleados.create', ['select1' => $select1,
                                                  'select2' => $select2,
                                                  'select3' => $select3,
                                                  'select4' => $select4,
                                                  'select5' => $select5]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_contrato'=> ['required'],
            'tipo_empleo'=> ['required'],
            'area_id' => ['required'],
            'plaza_id' => ['required', 'unique:employees,place_id'] ,
            'fecha_ingreso' => ['required','date'],
            'apaterno' => ['required', 'min:2','max:20'],
            'amaterno' => ['required', 'min:2','max:20'],
            'nombre' => ['required','min:2','max:20'],            
            'fecha_nacimiento' => ['required','date'],
            'lugar_nacimiento' => ['required','min:5','max:85'],
            'sexo' => ['required'],
            'estado_civil' => ['required'],
            'rfc' => ['required','regex:/^[a-zA-Z0-9]+$/','size:13','unique:employees,rfc'],
            'curp' => ['required','regex:/^[a-zA-Z0-9]+$/','size:18','unique:employees,curp'],
            'telefono' => ['required','numeric','digits:10'],
            'email' => ['required','email','min:5','max:50','unique:employees,email'],
            'nombre_emergencia' => ['required','min:2','max:50'],
            'num_emergencia' => ['required','numeric','digits:10'],
            'direccion_emergencia' => ['required','min:2','max:50'],
            'estado' => ['required','min:5','max:85'],
            'municipio' => ['required','min:5','max:85'],
            'colonia' => ['required','min:5','max:50'],
            'tipo_vialidad' => ['required','min:5','max:50'],
            'calle' =>['required','min:5','max:50'],
            'num_exterior' => ['required','numeric','max_digits:5'],
            'num_interior' => ['nullable','numeric','max_digits:5'],
            'cp' => ['required','numeric','digits:5'],
            'localidad' => ['required','min:5','max:85'],
            'num_cuenta' => ['required','digits:10'],
            'clabe' => ['required','digits:18'],
            'banco_id' => ['required'],
            //'fecha_baja' => ['required','date'],
            //'motivo_baja' => ['required','min:5','max:85']
        ]);
        $diccionario = ['á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'Á' => 'A',
        'É' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ú' => 'U'];
        //Eliminando acentos        
        $slug_apaterno = Str::slug($request->input('apaterno'),' ','es',$diccionario);
        $slug_amaterno = Str::slug($request->input('amaterno'),' ','es',$diccionario);
        $slug_name = Str::slug($request->input('nombre'),' ','es',$diccionario);
        //
        $empleado = new Employee();
        $empleado->mov_type = "Nuevo Ingreso";
        $empleado->contract_type = $request->input('tipo_contrato');
        $empleado->job_type = $request->input('tipo_empleo');
        $empleado->area_id = $request->input('area_id');
        $empleado->place_id = $request->input('plaza_id');
        $empleado->start_date = $request->input('fecha_ingreso');
        $empleado->last_name_1 = ucwords($slug_apaterno);
        $empleado->last_name_2 = ucwords($slug_amaterno);
        $empleado->name = ucwords($slug_name);
        $empleado->birthday = $request->input('fecha_nacimiento');
        $empleado->birthplace = $request->input('lugar_nacimiento');
        $empleado->sex = $request->input('sexo');
        $empleado->marital_status = $request->input('estado_civil');
        $empleado->rfc = $request->input('rfc');
        $empleado->curp = $request->input('curp');
        $empleado->phone = $request->input('telefono');
        $empleado->email = $request->input('email');
        $empleado->emergency_name = $request->input('nombre_emergencia');
        $empleado->emergency_number = $request->input('num_emergencia');
        $empleado->emergency_address = $request->input('direccion_emergencia');
        $empleado->state = $request->input('estado');
        $empleado->county = $request->input('municipio');
        $empleado->neighborhood = $request->input('colonia');
        $empleado->roadway_type = $request->input('tipo_vialidad');
        $empleado->street = $request->input('calle');
        $empleado->outdoor_number = $request->input('num_exterior');
        $empleado->interior_number = $request->input('num_interior');
        $empleado->cp = $request->input('cp');
        $empleado->locality = $request->input('localidad');
        $empleado->account_number = $request->input('num_cuenta');
        $empleado->clabe = $request->input('clabe');
        $empleado->bank_id = $request->input('banco_id');
        $empleado->status = 'active';
        $empleado->modified_by = Auth::user()->email;
        //$empleado->save();
        //construyendo usuario del sistema
        $date = Carbon::now();
        $fecha = $date->format('Y');
        $name = $empleado->name . ' ' . $empleado->last_name_1 . ' ' . $empleado->last_name_2;
        $trim = trim($empleado->name);
        $email = $trim[0] . $empleado->last_name_1.'@fidsecpol.gob.mx';
        $usuario = strtolower($email);
        $password = $trim[0] . $empleado->last_name_1.$fecha;
        $count = User::where('email', $usuario)->count();
        if ($count !== 0) {
            //Si existe un usuario con el mismo nombre de correo cambiar datos que componen el nombre de usuario
            $usuario = $trim[0] . $empleado->last_name_2 . '@fidsecpol.gob.mx';
        } else {
            //Registrando el usuario de sistema
            $user = new User();
            //consultando el area al que se registrara
            $rol = Area::find($empleado->area_id);
            $user->name = $name;
            $user->email = $usuario;
            $user->password = Hash::make($password);
            $user->status = 'active';
            $user->modified_by = Auth::user()->email;
            $user->save();
            switch ($rol->id) {
                case '1':
                    $user->assignRole('Coordinacion');
                    break;
                case '2':
                    $user->assignRole('Administracion');
                    break;  
                case '3':
                    $user->assignRole('Juridica');
                    break;
                case '4':
                    $user->assignRole('Medica');
                    break;
                case '5':
                    $user->assignRole('Humanos');
                    break;  
                case '6':
                    $user->assignRole('Financieros');
                    break;
                case '7':
                    $user->assignRole('Materiales');
                    break;
                case '8':
                    $user->assignRole('Prestaciones');
                    break;  
                case '9':
                    $user->assignRole('Tecnologias');
                    break;              
                default:
                $user->assignRole('Default');
                    break;
            }
            //Agregando el usuario creado a la tabla de empleados
            $empleado->user_id = $user->id;
            $empleado->save();
            session()->flash('msg_tipo', 'success');
            session()->flash('msg', 'Registro creado con éxito!');
            return to_route('humanos.empleados.index');
        }
    }
    public function show(string $id)
    {
        $row = Employee::find($id);
        // $ae = EmployeeFile::where('employee_id',$id)->first();
         $fam = EmployeeFamily::where('employee_id',$id)->get();
        return view('humanos.empleados.show',['empleado' => $row,
                                                'fam'=>$fam]);
        
    }
    public function edit(string $id)
    {
        $row = Employee::find($id);
        $select1 = Area::where('status', 'active')->get();
        $select2 = Place::where('status', 'active')->get();
        $select3 = State::where('status', 'active')->get();
        $select4 = County::where('status', 'active')->get();
        $select5 = Bank::where('status', 'active')->get();
        return view('humanos.empleados.edit',[
            'select1' => $select1,
            'select2' => $select2,
            'select3' => $select3,
            'select4' => $select4,
            'select5' => $select5,
            'empleado' => $row]);
    }   
    public function update(Request $request, string $id){
        $validated = $request->validate([
            'tipo_contrato'=> ['required'],
            'tipo_empleo'=> ['required'],
            'area_id' => ['required'],
            'hidden_plaza' => ['required', 'unique:employees,place_id,'.$id] ,
            'fecha_ingreso' => ['required','date'],
            'apaterno' => ['required', 'min:2','max:20'],
            'amaterno' => ['required', 'min:2','max:20'],
            'nombre' => ['required','min:2','max:20'],            
            'fecha_nacimiento' => ['required','date'],
            'lugar_nacimiento' => ['required','min:5','max:85'],
            'sexo' => ['required'],
            'estado_civil' => ['required'],
            'rfc' => ['required','regex:/^[a-zA-Z0-9]+$/','size:13','unique:employees,rfc,'.$id],
            'curp' => ['required','regex:/^[a-zA-Z0-9]+$/','size:18','unique:employees,curp,'.$id],
            'telefono' => ['required','numeric','digits:10'],
            'email' => ['required','email','min:5','max:50','unique:employees,email,'.$id],
            'nombre_emergencia' => ['required','min:2','max:50'],
            'num_emergencia' => ['required','numeric','digits:10'],
            'direccion_emergencia' => ['required','min:2','max:50'],
            'estado' => ['required','min:5','max:85'],
            'municipio' => ['required','min:5','max:85'],
            'colonia' => ['required','min:5','max:50'],
            'tipo_vialidad' => ['required','min:5','max:50'],
            'calle' =>['required','min:5','max:50'],
            'num_exterior' => ['required','numeric','max_digits:5'],
            'num_interior' => ['nullable','numeric','max_digits:5'],
            'cp' => ['required','numeric','digits:5'],
            'localidad' => ['required','min:5','max:85'],
            'num_cuenta' => ['required','digits:10'],
            'clabe' => ['required','digits:18'],
            'banco_id' => ['required'],
            //'fecha_baja' => ['required','date'],
            //'motivo_baja' => ['required','min:5','max:85']
        ]);
        $diccionario = ['á' => 'a',
                        'é' => 'e',
                        'í' => 'i',
                        'ó' => 'o',
                        'ú' => 'u',
                        'Á' => 'A',
                        'É' => 'E',
                        'Í' => 'I',
                        'Ó' => 'O',
                        'Ú' => 'U'];
        $slug_apaterno = Str::slug($request->input('apaterno'),' ','es',$diccionario);
        $slug_amaterno = Str::slug($request->input('amaterno'),' ','es',$diccionario);
        $slug_name = Str::slug($request->input('nombre'),' ','es',$diccionario);
        $row = Employee::find($id);
        $row->mov_type = "Nuevo Ingreso";
        $row->contract_type = $request->input('tipo_contrato');
        $row->job_type = $request->input('tipo_empleo');
        $row->area_id = $request->input('area_id');
        $row->place_id = $request->input('hidden_plaza');
        $row->start_date = $request->input('fecha_ingreso');
        $row->last_name_1 = ucwords($slug_apaterno);
        $row->last_name_2 = ucwords($slug_amaterno);
        $row->name = ucwords($slug_name);
        $row->birthday = $request->input('fecha_nacimiento');
        $row->birthplace = $request->input('lugar_nacimiento');
        $row->sex = $request->input('sexo');
        $row->marital_status = $request->input('estado_civil');
        $row->rfc = $request->input('rfc');
        $row->curp = $request->input('curp');
        $row->phone = $request->input('telefono');
        $row->email = $request->input('email');
        $row->emergency_name = $request->input('nombre_emergencia');
        $row->emergency_number = $request->input('num_emergencia');
        $row->emergency_address = $request->input('direccion_emergencia');
        $row->state = $request->input('estado');
        $row->county = $request->input('municipio');
        $row->neighborhood = $request->input('colonia');
        $row->roadway_type = $request->input('tipo_vialidad');
        $row->street = $request->input('calle');
        $row->outdoor_number = $request->input('num_exterior');
        $row->interior_number = $request->input('num_interior');
        $row->cp = $request->input('cp');
        $row->locality = $request->input('localidad');
        $row->account_number = $request->input('num_cuenta');
        $row->clabe = $request->input('clabe');
        $row->bank_id = $request->input('banco_id');
        $row->status = 'active';
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro actualizado con éxito!');
        return to_route('humanos.empleados.index');
    } 
    public function destroy(string $id)
    {
        $row = Employee::find($id);
        $row->status = 'inactive';
        $row->modified_by = Auth::user()->email;
        $row->save();
        //Deshabilitando datos familiares
        $count2 = EmployeeFamily::where('employee_id',$id)->count();
        if($count2 !== 0){
            $fam = EmployeeFamily::where('employee_id',$id)->get();
            $fam->status = 'inactive';
            $fam->modified_by = Auth::user()->email;
            $fam->save();
        }
        //Deshabilitando el usuario del sistema del empleado
        $count4 = User::find($row->user_id);
        if($count4 !== 0){
            $usuario = User::find($row->user_id);
            $usuario->status = 'inactive';
            $usuario->modified_by = Auth::user()->email;
            $usuario->save();
        }
        //Deshabilitando la plaza
        $count5 = Place::find($row->place_id);
        if($count5 !== 0){
            $plaza = Place::find($row->place_id);
            $plaza->status = 'inactive';
            $plaza->modified_by = Auth::user()->email;
            $plaza->save();
        //Liberando el lugar en el numero de plazas ocupadas en categoria
        $categoria = Category::find($plaza->category_id);
        $categoria->decrement('covered_places');
        $categoria->modified_by = Auth::user()->email;
        $categoria->save();
        }
        session()->flash('msg_tipo', 'success');
        session()->flash('msg', 'Registro deshabilidado con éxito!');
        return to_route('humanos.empleados.index');
    }    
}
