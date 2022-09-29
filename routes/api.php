<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TransactionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [TransactionController::class, 'cek']);

Route::post('tarik_tunai', [TransactionController::class, 'tarik_tunai']);
Route::post('cek_saldo', [TransactionController::class, 'cek_saldo']);
Route::post('pembayaran', [TransactionController::class, 'pembayaran']);
