<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiResourceController;

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

// Api Crud:
Route::get('apishow', [ApiController::class, 'apiShow']);
Route::get('apishowdb/{id?}', [ApiController::class, 'apiShowDb']);
Route::post('apistore', [ApiController::class, 'apiStore']);
Route::put('apiupdate', [ApiController::class, 'apiUpdate']);
Route::delete('apidelete/{id}', [ApiController::class, 'apiDelete']);
Route::get('search/{name}', [ApiController::class, 'apiSearch']);
Route::post('validate', [ApiController::class, 'apiValidate']);
Route::post('apiupload', [ApiController::class, 'apiUpload']);

Route::apiResource('apiresource', ApiResourceController::class);