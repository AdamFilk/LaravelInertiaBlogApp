<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function inertiaShareData(string $name, $data){
        Inertia::share($name,function() use($data) {
            return $data;
        });
    }
    
    // ['breadcrumb'=> [
    //     ['name'=>'Home','link'=> '/','is_active'=>false],
    //     ['name'=>'Dashboard','link'=> null,'is_active'=>true],
    // ],
    // 'page_title'=>'Dashboard'];
}
