<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryController;
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

Route::resource('products', ProductController::class);

Route::middleware(['admin'])->group(function () {
    Route::resource('categories', CategoryController::class);

    Route::controller(PaymentController::class)->group(function () {
        Route::get('/payments', 'index')->name('payments.index');
        Route::post('/payments/{order}/cancel', 'cancel')->name('payments.cancel');
        Route::post('/payments/{order}/capture', 'capture')->name('payments.capture');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('addresses', AddressController::class);
    Route::resource('orders', OrderController::class);

    Route::controller(PaymentController::class)->group(function () {
        Route::post('/payments', 'store')->name('payments.store');
        Route::post('/payments/{order}/refund', 'refund')->name('payments.refund');
    });
});


require __DIR__ . '/auth.php';
