<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\Dashboard;
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

Route::resource('products', ProductController::class)->only(['index', 'show']);

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::resource('users', AdminUserController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('products', AdminProductController::class);

        Route::name('payments.')->controller(AdminPaymentController::class)->group(function () {
            Route::get('/payments', 'index')->name('index');
            Route::post('/payments/{order}/cancel', 'cancel')->name('cancel');
            Route::post('/payments/{order}/capture', 'capture')->name('capture');
        });
    });
});

Route::middleware('auth')->group(function () {

    Route::name('profile.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');
        Route::resource('addresses', AddressController::class);
    });

    Route::resource('orders', OrderController::class)->only(['index', 'store', 'destroy']);

    Route::controller(PaymentController::class)->name('payments.')->group(function () {
        Route::post('/payments', 'store')->name('store');
        Route::post('/payments/{order}/refund', 'refund')->name('refund');
    });
});


require __DIR__ . '/auth.php';
