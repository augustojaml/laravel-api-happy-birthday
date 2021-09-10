<?php

use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\SessionController;
use App\Http\Controllers\Api\V1\VoucherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// FRONT
Route::group([
    'prefix' => 'v1'
], function () {
    //PUBLIC

    Route::post('vouchers', [VoucherController::class, 'store']);

    //SESSIONS
    Route::post('login', [SessionController::class, 'login']);

    Route::get('/unauthenticated', [SessionController::class, 'unauthenticated'])->name('login');

    //PROTECTED
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard']);
        Route::post('logout', [SessionController::class, 'logout']);
        Route::get('vouchers', [VoucherController::class, 'index']);
    });
});




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
