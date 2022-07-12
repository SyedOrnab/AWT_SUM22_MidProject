<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MedicineController;
use App\Http\Middleware\Suppliermiddleware;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/suplogin',[SupplierController::class, 'suplogin'])->name('suplogin');
Route::get('/supregistration',[SupplierController::class, 'supregistration']);
Route::post('/supregistration',[SupplierController::class, 'supregister'])->name('sup-register');
Route::post('/suplogin',[SupplierController::class, 'suplog'])->name('suplogin.login');
Route::get('/dashboard',[SupplierController::class, 'dashboard'])->name('dashboard')->middleware('logged.user');
Route::get('/supmedicine',[MedicineController::class, 'supmedicine']);
Route::get('/supmedicinecreate',[MedicineController::class, 'supmedicinecreate']);
Route::get('/supmedicinelist',[MedicineController::class, 'supmedicinelist'])->name('medicine.list');

Route::post('/supmedicine',[MedicineController::class, 'supmedicineinfo'])->name('supmedicine.info');

Route::get('/supmedicinedetails', [MedicineController::class,'supmedicinedetails'])->name('medicine.details');
Route::get('/supmedicinedget',[MedicineController::class, 'supmedicineget']);
Route::get('/supmedicineedit/{id}',[MedicineController::class, 'supmedicineedit'])->name('medicine.edit');
Route::post('/supmedicineedit',[MedicineController::class,'editmedicine'])->name('medi.edit');
Route::get('/logout',function(){
    session()->forget('logged');
    session()->flash('msg','Sucessfully Logged out');
    return redirect()->route('suplogin.login');
})->name('logout');
Route::get('/supmedicinedelete/{id}',[MedicineController::class, 'supmedicinedelete'])->name('medicine.delete');
