<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/apiTest/profile', [UserController::class, 'getProfile']);
Route::middleware('auth:sanctum')->post('/apiTest/profile', [UserController::class, 'updateProfile']);
Route::middleware('auth:sanctum')->put('/apiTest/password', [UserController::class, 'updatePassword']);

Route::post('/apiTest/login', [UserController::class, 'login']);
Route::post('/apiTest/register', [UserController::class, 'store']);
Route::get('/apiTest/users', [UserController::class, 'index']);

Route::get("/apiTest/logistic", [UserController::class, 'getLogistic']);
Route::post("/apiTest/addLogistic", [UserController::class, "storeLogistic"]);

Route::get("/apiTest/supplier", [UserController::class, 'getSupplier']);
Route::post("/apiTest/addSupplier", [UserController::class, "storeSupplier"]);

Route::get("/apiTest/inlogistic", [UserController::class, 'getInlogistic']);
Route::post("/apiTest/addInlogistic", [UserController::class, "storeInlogistic"]);

Route::get("/apiTest/outlogistic", [UserController::class, 'getOutlogistic']);
Route::post("/apiTest/addOutlogistic", [UserController::class, "storeOutlogistic"]);

Route::get("/apiTest/logisticrequest", [UserController::class, 'getLogisticRequest']);
Route::post("/apiTest/addLogisticRequest", [UserController::class, "storeLogisticRequest"]);

