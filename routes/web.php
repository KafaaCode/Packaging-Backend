<?php

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

Route::get('/', function () {
    $categories = Category::all();
    return view('welcome',[
        'categories' => $categories
    ]);
    // return view('dashboard');
    // return redirect('/dashboard');
});

// Route::get('/dashboard', function () {
//     // return view('dashboard');
//     return redirect('/');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/users', function () {
    return view('users.index');
})->middleware('auth')->name('users.index');
Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');


Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::get('user-create', [UserController::class, 'create_user']);
Route::resource('products', ProductController::class);


Route::middleware(['auth']) 
    ->group(function () {

    });

require __DIR__ . '/auth.php';
