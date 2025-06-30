<?php
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/register', [ProductsController::class, 'create']);
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/{productId}', [ProductsController::class, 'show']);
Route::put('/products/{productId}', [ProductsController::class, 'update'])->name('products.update');
