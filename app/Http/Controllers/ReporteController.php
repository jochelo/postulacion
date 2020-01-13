<?php

namespace App\Http\Controllers;

use App\TestUser;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function solicitud()
    {
        $user = Auth::user();
        return view('reporte.solicitud', compact('user'));
    }

    public function testAprobado()
    {
        $user = Auth::user();
        $test_user = TestUser::where('user_id', $user['user_id'])->first();
        return view('reporte.test-aprobado', [
            'test_user' => $test_user
        ]);
    }
}
