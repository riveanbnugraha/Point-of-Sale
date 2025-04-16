<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/category', function () {
//     return view('category');
// })->middleware(['auth', 'verified'])->name('category');

// Route::get('/mitem', function () {
//     return view('item');
// })->middleware(['auth', 'verified'])->name('item');

// Route::get('/transaction', function () {
//     return view('transaction');
// })->middleware(['auth', 'verified'])->name('transaction');

// Route::get('/tranhis', function () {
//     return view('tranhis');
// })->middleware(['auth', 'verified'])->name('tranhis');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/category', CategoryController::class);
Route::resource('/item', ItemController::class);
Route::resource('/transaction', TransactionController::class);
Route::resource('/tranhis', TransactionDetailController::class);

require __DIR__.'/auth.php';
