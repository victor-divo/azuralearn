<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return Product::all();
});

Route::get('/create-product', function () {
    return Product::create([
        'sku_code' => '2210MA0001',
        'name' => 'Monitor Gaming 27 inch',
        'description' => 'Monitor untuk gamer sejati',
        'price' => 2000,
        'stock' => 10,
    ]);
});

Route::get('/edit-product', function () {
    $product = Product::find(1);

    $product->update([
        'sku_code' => '2210MA0001',
        'name' => 'Monitor Biasa 27 inch',
        'description' => 'Monitor untuk pekerja kantoran',
        'price' => 1500,
        'stock' => 5,
    ]);

    return $product;
});

Route::get('/delete-product', function () {
    $product = Product::find(1);

    return $product->delete();
});

Route::prefix('/products')->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
});
