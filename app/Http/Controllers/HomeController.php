<?php

namespace App\Http\Controllers;

use App\TestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        if(Auth::user()->es_admin)
            return redirect('users/');
        else {
            $testUser=TestUser::where('user_id',Auth::user()['user_id'])->first();
            if(isset($testUser))
                return view('home',compact('testUser'));
            else
                return view('home');
        }
    }
}
