<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Prestaciones\AffiliateFamily;
use Illuminate\Http\Request;

class AffiliateFamilyController extends Controller
{
    public function index()
    {
        return view('prestaciones.familiares.index');
    }
    public function create()
    {
        return view('prestaciones.familiares.create');
    }
    public function show(string $id)
    {
        $row = AffiliateFamily::find($id);
        // $ae = EmployeeFile::where('employee_id',$id)->first();
         //$fam = EmployeeFamily::where('employee_id',$id)->get();
        return view('prestaciones.familiares.show',['familiar' => $row]);
        
    }
}
