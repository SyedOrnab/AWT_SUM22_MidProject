<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MedicineController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/supregistration',[SupplierController::class, 'supregister']);
Route::post('/suplogin',[SupplierController::class, 'suplog']);
Route::post('/supmedicine',[MedicineController::class, 'supmedicineinfo']);
//Route::get('/supplier/{id}',[SupplierController::class, 'singleprofile']);