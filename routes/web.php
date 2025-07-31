<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');    

Route::get('/users', function () {
    return view('users.index');
})->middleware('auth')->name('users.index');

Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');


Route::get('user-create', [UserController::class, 'create_user']);
Route::resource('products', ProductController::class);

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'webIndex'])->name('categories.web.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/web-categories/{id}', [CategoryController::class, 'webshow'])->name('categories.web.show');
    Route::get('products/{product}', [ProductController::class, 'webShow'])->name('products.web.show');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
