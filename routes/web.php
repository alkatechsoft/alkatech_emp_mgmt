<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpDataController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return redirect('admin');
});

// Route::get('/updatepassword', [AdminController::class, 'updatepassword']);
Route::get('/registration', [EmpDataController::class, 'emp_registration_form']);
Route::post('/emp_registration_form_process', [EmpDataController::class, 'emp_registration_form_process'])->name('frontend.emp_registration_form_process');

//admin section start here
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'], function(){
Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('admin/logout', function(){
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->forget('TOTAL_GUARD');
    session()->flash('error','Logout Successfully');
return redirect('admin');
});
});
