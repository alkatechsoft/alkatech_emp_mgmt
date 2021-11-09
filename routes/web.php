<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpDataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmpReportController;

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
// Route::get('export-excel', [EmpreportController::class, 'export']);
Route::get('export-excel', [AdminController::class, 'dataexport']);
Route::get('email-report', [AdminController::class, 'send_report_alert_mail_to_emp']);

// Route::get('/updatepassword', [AdminController::class, 'updatepassword']);
Route::get('/registration', [EmpDataController::class, 'emp_registration_form']);
Route::post('/emp_registration_form_process', [EmpDataController::class, 'emp_registration_form_process'])->name('frontend.emp_registration_form_process');

//admin section start here
Route::get('admin', [AdminController::class, 'index']);
Route::get('user', [EmpController::class, 'index']);
Route::post('user_login_process', [EmpController::class, 'user_login_process'])->name('emp.user_login_process');
Route::post('user_signup', [EmpController::class, 'user_signup'])->name('emp.user_signup');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('email_verification/{id}', [EmpController::class, 'email_verification']);
Route::post('forgot_password_process', [EmpController::class, 'forgot_password_process']);
Route::get('forgot_password_process_change/{id}', [EmpController::class, 'forgot_password_process_change']);
Route::post('forgot_password_process_change_update', [EmpController::class, 'forgot_password_process_change_update']);


Route::group(['middleware'=>'admin_auth'], function(){
Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('admin/emp', [AdminController::class, 'emp_list']);
Route::get('admin/emp/status/{status}/{id}', [AdminController::class, 'status']);
Route::get('admin/emp/status/{status}/{id}', [AdminController::class, 'status']);

Route::post('admin/search_employee', [AdminController::class, 'search_employee'])->name('admin.search_employee');
Route::get('admin/upload_attendance', [AdminController::class, 'upload_attendance']);
Route::post('admin/upload_attendance_process', [AdminController::class, 'upload_attendance_process'])->name('admin.upload_attendance_process');

Route::get('admin/attendance-reporting', [AdminController::class, 'attendance_reporting']);
Route::post('admin/attendance_reporting_process', [AdminController::class, 'attendance_reporting_process'])->name('admin.attendance_reporting_process');

Route::post('admin/attendance_filter_before_upload_process', [AdminController::class, 'attendance_filter_before_upload_process'])->name('admin.attendance_filter_before_upload_process');

Route::get('admin/import-attendance', [AdminController::class, 'import_attendance_form']);
Route::post('admin/import-attendance-process', [AdminController::class, 'import_attendance_form_process'])->name('admin.import_attendance_form_process');



Route::post('admin/create_user', [AdminController::class, 'create_user'])->name('admin.create_user');
// Route::post('admin/emp/send_login_details_to_emp', [AdminController::class, 'send_login_details_to_emp'])->name('admin.send_login_details_to_emp');
Route::get('admin/emp/send_login_details_to_emp/{id}', [AdminController::class, 'send_login_details_to_emp']);


Route::get('admin/logout', function(){
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_ID');
    session()->flash('error','Logout Successfully');
return redirect('admin');
});
});
Route::group(['middleware'=>'emp_auth'], function(){
    Route::get('user/dashboard', [EmpController::class, 'dashboard']);
    Route::get('user/personal-info', [EmpController::class, 'personal_info']);
    Route::get('user/manage-personal-info/{id}', [EmpController::class, 'manage_personal_info']);
    Route::post('user/manage-personal-info', [EmpController::class, 'manage_personal_info_process'])->name('emp.manage_personal_info_process');
    Route::post('update-personal-info', [EmpController::class, 'update_personal_info_process'])->name('emp.update_personal_info_process');
    
    Route::get('user/academic-info', [EmpController::class, 'academic_info']);
    Route::get('user/manage-academic-info/{id}', [EmpController::class, 'manage_academic_info']);
    Route::post('user/manage-academic-info', [EmpController::class, 'manage_academic_info_process'])->name('emp.manage_academic_info_process');
   
    Route::get('user/professional-info', [EmpController::class, 'professional_info']);
    Route::get('user/manage-professional-info/{id}', [EmpController::class, 'manage_professional_info']);
    Route::post('user/manage-professional-info', [EmpController::class, 'manage_professional_info_process'])->name('emp.manage_professional_info_process');
 
    Route::get('user/logout', function(){
        session()->forget('USER_LOGIN');
        session()->forget('USER_ID');
        session()->flash('error','Logout Successfully');
    return redirect('user');
    });
    });