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
    return $request->student();
});


// // For Student Leave
Route::apiResource("leaves", LeaveController::class);

Route::get('/send-mail', [MailController::class, 'sendEmail']);

// // -----------------------

// -------------------admin--------------------
Route::post('/create', [AdminController::class, 'store']);
Route::post('/login', [AdminController::class, 'login']);
Route::apiResource("/admin", AdminController::class);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('/studentsInAdmin',StudentController::class);
    Route::apiResource("leaves", LeaveController::class);
    Route::put('/resetPassword/{id}', [AdminController::class, 'reset']);
    Route::get('/getOneAdmin/{id}', [AdminController::class, 'show']);
    Route::put('/editAdminProfile/{id}', [AdminController::class, 'editProfile']);
    Route::post('/logout', [AdminController::class, 'logout']);
});

// -------------------student--------------------
Route::post('/loginStudent', [StudentController::class, 'login']);
Route::get('/studentCompare',[StudentController::class,'index']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::put('/updatePhoto/{id}', [StudentController::class, 'updatePhoto']);
    Route::apiResource('/students',StudentController::class);
    Route::apiResource("leaves", LeaveController::class);
    Route::get("/getAdminId",[AdminController::class,'index']);
    Route::get("/getOneStudent/{id}",[StudentController::class,'getOneStudent']);
    Route::post('/logOutStudent',[StudentController::class, 'signOut']);
});
