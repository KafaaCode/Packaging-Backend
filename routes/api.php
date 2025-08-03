<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('specialization-and-country', [AuthController::class, 'specializationAndcountry']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/api-users', [UserController::class, 'all_users']);
    Route::get('profile', [AuthController::class, 'profile']);
    Route::put('profile', [AuthController::class, 'updateProfile']);
    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::apiResource('orders', OrderController::class);
    Route::get('my-orders', [OrderController::class, 'myOrders']);
    Route::apiResource('order-details', OrderDetailController::class);
    Route::apiResource('products', ProductController::class);
    Route::get('products/categories/{id}', [ProductController::class, 'productsCategory']);
    Route::apiResource('categories', CategoryController::class);
    Route::get('admin/categories', [CategoryController::class, 'adminIndex']);
    Route::apiResource('countries', CountryController::class);
    Route::apiResource('specializations', SpecializationController::class);
    Route::apiResource('supports', SupportController::class);
    Route::apiResource('settings', SettingController::class);
});
Route::post('logout', [AuthController::class, 'logout']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);