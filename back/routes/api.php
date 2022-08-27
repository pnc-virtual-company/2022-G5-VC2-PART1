<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;


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

// For Student
Route::apiResource("students",StudentController::class);
// // For Admin
Route::apiResource("admin",AdminController::class);
// For Student Leave
Route::apiResource("leaves",LeaveController::class);

Route::get('/send-mail', [MailController::class, 'sendEmail']);

// // For login Admin
// Route::post('/login',[AdminController::class,'login']);

// For login Student 
Route::post('/loginStudent',[StudentController::class,'login']);
//update image
Route::put('/updatePhoto/{id}',[StudentController::class,'updatePhoto']);
// -----------------------
Route::post('/create',[AdminController::class,'store']);
Route::post('/login',[AdminController::class,'login']);
