<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $this->inertiaShareData('nav_data', 
            ['breadcrumb'=>
             [
                ['name'=>'Dashboard','link'=> null],
             ],
        'page_title'=>'Dashboard']);
        return inertia('Dashboard/Index');
    }
}
