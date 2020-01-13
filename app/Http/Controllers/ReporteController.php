<?php

namespace App\Http\Controllers;

use App\TestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function solicitud(){
        $user=Auth::user();
        return view('reporte.solicitud',compact('user'));
    }
    public function testAprobado(){
        $user = Auth::user();
        $testUser = TestUser::where('user_id',$user['user_id'])->first();
        dd($testUser);
    }
}
