<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Product;
use App\Http\Livewire\Category;
use App\Http\Livewire\OrderPage;
use App\Http\Livewire\SingleOrder;

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

Route::get('/dashboard',Dashboard::class)->name('dashboard')->middleware(['auth']);
Route::get('/product',Product::class)->name('product')->middleware(['auth']);
Route::get('/category',Category::class)->name('category')->middleware(['auth']);
Route::get('/orders',OrderPage::class)->name('order-page')->middleware(['auth']);
Route::get('/order/{page_id}',SingleOrder::class)->name('single-order')->middleware(['auth']);

require __DIR__.'/auth.php';
