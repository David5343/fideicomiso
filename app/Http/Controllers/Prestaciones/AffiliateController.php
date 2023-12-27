<?php

namespace App\Http\Controllers\Prestaciones;

use App\Http\Controllers\Controller;
use App\Models\Humanos\Bank;
use App\Models\Humanos\County;
use App\Models\Humanos\State;
use App\Models\Prestaciones\Subdependency;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function index()
    {
        return view('prestaciones.afiliados.index');
    }
    public function create()
    {
        $select1 = Subdependency::where('status', 'active')->get();
        $select2 = State::where('status', 'active')->get();
        $select3 = County::where('status', 'active')->get();
        $select4 = Bank::where('status', 'active')->get();
        return  view('prestaciones.afiliados.create', ['select1' => $select1,
                                                  'select2' => $select2,
                                                  'select3' => $select3,
                                                  'select4' => $select4]);
    }
}
