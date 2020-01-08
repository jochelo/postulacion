<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function solicitud(){
        $user=Auth::user();
        return view('reporte.solicitud',compact('user'));
    }
}
