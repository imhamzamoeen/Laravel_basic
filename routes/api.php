
<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/userDto/create', ['uses' => UserController::class . '@store', 'dummy' => 'data']);
Route::get('/userDto', ['uses' => UserController::class . '@index', 'dummy' => 'data']);
Route::get('/userDto/{user}', ['uses' => UserController::class . '@show', 'dummy' => 'data']);
