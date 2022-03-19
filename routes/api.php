<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#Controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::get('/test_api', function(){
    return response()->json([
        'enabled' => 'Laravel 8 CORS Demo',
        'status' => 201
    ]);
});


Route::get('/test_api2', function(){
    return response()->json([
        'enabled' => 'Test Api 2 working just fine',
        'status' => 201
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/user/login', [AuthController::class, 'login']);

#Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user/fetch', [UserController::class, 'fetch']);
    Route::post('/user/logout', [AuthController::class, 'logout']);
    Route::post('/user/logout_using_token', [AuthController::class, 'forceLogout']);
    Route::get('/auth/test', function(){
        return response()->json([
            'middleware' => 'Sanctum',
            'message' => 'Successfully entered the route!',
            'status' => 200
        ]);
    });

    Route::get('/auth/test/token', function(){
         return response()->json([
            'message' => 'Sample response only',
            'status' => 201
        ]); 
    });

});    


