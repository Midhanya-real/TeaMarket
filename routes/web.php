<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    return redirect('products');
})->name('homePage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('addresses', AddressController::class);
    Route::resource('orders', OrderController::class);

    Route::controller(HistoryController::class)->group(function () {
        Route::get('/history', 'index')->name('history.index');
        Route::post('/history', 'store')->name('history.store');
        Route::post('/history/{order}/cancel', 'cancel')->name('history.cancel');
        Route::post('/history/{order}/refund', 'refund')->name('history.refund');
    });
});

Route::middleware(['admin', 'moder'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::post('/history/{order}/capture', [HistoryController::class, 'capture'])->name('history.capture');
});

Route::resource('products', ProductController::class);


require __DIR__ . '/auth.php';
