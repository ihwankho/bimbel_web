<?php

use App\Http\Controllers\API\authController;
use App\Http\Controllers\api\NotificationController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\TransactionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
Route::post('/login', [authController::class, 'login']);

Route::get('/schedules', [ScheduleController::class, 'index']);
Route::get('/schedules/{id}', [ScheduleController::class, 'show']);
Route::post('/schedules', [ScheduleController::class, 'store']);
Route::put('/schedules/{id}', [ScheduleController::class, 'update']);
Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy']);

Route::post("/register", function (Request $request){
    User::create(
        [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]
        );

        return response()->json([
            "message"=> "OK!"
        ]);
});


Route::get("/notifications", [NotificationController::class, 'index']);
Route::get("/notifications/{id}", [NotificationController::class, 'show']);
Route::post("/notifications", [NotificationController::class, 'store']);
Route::post("/notifications/{id}", [NotificationController::class, 'update']);
Route::delete("/notifications/{id}", [NotificationController::class, 'destroy']);

Route::get("/transaction", [TransactionController::class, 'index']);
Route::get("/transaction/{id}", [TransactionController::class, 'show']);
Route::post("/transaction", [TransactionController::class, 'store']);
Route::delete("/transaction/{id}", [TransactionController::class, 'destroy']);
