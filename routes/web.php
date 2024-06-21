<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Auth::routes();

route::middleware(['auth'])->group(function () {


//Route::get ('products', [ProductController::class]);
Route::get('/product/index', [ProductController::class, 'index'])->name('products.index');
Route::get  ('/product/show', [ProductController::class, 'show'])->name('products.show');
Route::get ('/product/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/delete/{id}', [ProductController::class, 'delete']);
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put ('/update', [ProductController::class, 'update'])->name('products.update');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
