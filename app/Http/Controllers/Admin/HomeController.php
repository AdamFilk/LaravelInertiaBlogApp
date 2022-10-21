<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        if(!Auth::check()){
            return Inertia::render('Auth/Signin/Index');
        }elseif(Auth::user()->is_admin === 1){
            return redirect()->route('admin.dashboard');
        }
    }
}
