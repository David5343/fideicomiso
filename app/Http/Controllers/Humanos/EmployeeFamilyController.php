<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Employee;
use App\Models\Humanos\EmployeeFamily;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeFamilyController extends Controller
{
    public function index()
    {
        return view('humanos.familiares.index');
    }
    public function edit(string $id)
    {
        
        $row = EmployeeFamily::find($id);
        $empleado = Employee::find($row->employee_id);
        return view('humanos.familiares.edit',[
            'fam' => $row,
            'empleado' => $empleado]);
    }
    public function update(Request $request, string $id)
    {
        $empleado = Employee::find($request->input('empleado_id'));
        $fecha_limite = Carbon::parse($empleado->start_date);
        $fecha = $fecha_limite->format('Y-m-d');
           $validated = $request->validate([
               'nombre' => ['required','max:50'],
               'apaterno' => ['required','max:20'],
               'amaterno' => ['required','max:20'],
                'fecha_ingreso' => ['required','date','after:'.$fecha],
               'curp' => ['required','unique:employee_families,curp,'.$id],
               'parentesco' => ['required'],
               'empleado_id' => ['required'],
               
           ]);
        $fam = EmployeeFamily::find($id);
        $fam->name = $request->input('nombre');
        $fam->last_name_1 = $request->input('apaterno');
        $fam->last_name_2 = $request->input('amaterno');
        $fam->start_date = $request->input('fecha_ingreso');
        $fam->curp = $request->input('curp');
        $fam->relationship = $request->input('parentesco');
        $fam->modified_by = Auth::user()->email;
        $fam->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro editado con éxito!');  
        return to_route('humanos.familiares.index');

    }    
}
