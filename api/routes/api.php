<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\master\Faskes as MasterFaskesController;
use App\Http\Controllers\application\User as ApplicationUserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//login

Route::post('/register', [ApplicationUserController::class, 'register']);
Route::post('/login', [ApplicationUserController::class, 'login']); // login endpoint
Route::middleware('auth:sanctum')->post('/logout', [ApplicationUserController::class, 'logout']);

//general data general
Route::middleware('auth:sanctum')->get("/general/faskes",[MasterFaskesController::class, "fetchAll"]);
Route::middleware('auth:sanctum')->get("/general/faskes/{id}",[MasterFaskesController::class, "fetch"]);