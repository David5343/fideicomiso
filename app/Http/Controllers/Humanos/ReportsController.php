<?php

namespace App\Http\Controllers\Humanos;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Category;
use App\Models\Humanos\Employee;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:humanos.reportes.index');
        //$this->middleware('subscribed')->except('store');
    }
    public function index(){
        return view('humanos.reportes.index');
    }
    public function tabulador(){
        $tabulador = Category::where('status','active')->get();
        if($tabulador)
        {
            $pa = $tabulador->sum('authorized_places');
            $po = $tabulador->sum('covered_places');
        }
        $jefe = 'C.P. JORGE GARCIA RAMOS';
        $admin = 'C.P. JORGE ANTONIO MARIN ESCOBAR';
        $cordi = 'C.P. MARTIN HERRERA MENDOZA';
        //return view('humanos.tabulador.index',['tabulador'=>$tabulador,'pa'=>$pa,'po'=>$po]);
        $pdf = Pdf::setPaper('letter','landscape')->loadView('humanos.reportes.tabulador',[
            'tabulador'=>$tabulador,
            'pa'=>$pa,
            'po'=>$po,
            'jefe' =>$jefe,
            'admin'=> $admin,
            'cordi'=>$cordi
        ]);
        return $pdf->stream('tabulador.pdf');
    }
    public function activos(){

        $personal = Employee::where('status','active')->get();
        $jefe = 'C.P. JORGE GARCIA RAMOS';
        $admin = 'C.P. JORGE ANTONIO MARIN ESCOBAR';
        $cordi = 'C.P. MARTIN HERRERA MENDOZA';
        //return view('humanos.tabulador.index',['tabulador'=>$tabulador,'pa'=>$pa,'po'=>$po]);
        $pdf = Pdf::setPaper('letter','landscape')->loadView('humanos.reportes.activos',[
            'personal'=>$personal,
            'jefe' =>$jefe,
            'admin'=> $admin,
            'cordi'=>$cordi
        ]);
        return $pdf->stream();
    }      
    public function inactivos(){

        $personal = Employee::where('status','inactive')->get();
        $jefe = 'C.P. JORGE GARCIA RAMOS';
        $admin = 'C.P. JORGE ANTONIO MARIN ESCOBAR';
        $cordi = 'C.P. MARTIN HERRERA MENDOZA';
        //return view('humanos.tabulador.index',['tabulador'=>$tabulador,'pa'=>$pa,'po'=>$po]);
        $pdf = Pdf::setPaper('letter','landscape')->loadView('humanos.reportes.inactivos',[
            'personal'=>$personal,
            'jefe' =>$jefe,
            'admin'=> $admin,
            'cordi'=>$cordi
        ]);
        return $pdf->stream();
    }   
    
}
