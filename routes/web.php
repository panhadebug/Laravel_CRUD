<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create/', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products/', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{pid}/edit/', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{pid}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{pid}', [ProductController::class, 'destroy'])->name('products.destroy');
use App\Http\Controllers\ProductController;
Route::resource('/products', ProductController::class);

use App\Http\Controllers\CustomerController;
Route::resource('/customers', CustomerController::class);

use App\Http\Controllers\AppointmentController;
Route::resource('/appointments', AppointmentController::class);









