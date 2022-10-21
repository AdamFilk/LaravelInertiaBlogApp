<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[HomeController::class,'index']);

Route::get('/login',[AuthenticatedSessionController::class,'create']);
Route::post('/login',[AuthenticatedSessionController::class,'store']);
Route::delete('/logout',[AuthenticatedSessionController::class,'destroy']);

Route::group(['prefix'=>'/admin','middleware'=>['is_admin']],function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('/category', CategoryController::class)->names([
        'index'=> 'admin.category.index',
        'create'=> 'admin.category.create',
        'store'=> 'admin.category.store',
        'edit'=> 'admin.category.edit',
        'update'=> 'admin.category.update',
        'show'=> 'admin.category.show',
        'delete'=> 'admin.category.delete',
    ]);
    Route::resource('/subcategory',SubcategoryController::class)->names([
        'index'=> 'admin.subcategory.index',
        'create'=> 'admin.subcategory.create',
        'store'=> 'admin.subcategory.store',
        'edit'=> 'admin.subcategory.edit',
        'update'=> 'admin.subcategory.update',
        'show'=> 'admin.subcategory.show',
        'delete'=> 'admin.subcategory.delete',
    ]);
});
