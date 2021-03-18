<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordRecoveryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserActionController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckLogin;

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

Route::get('/back', [BackController::class, 'home'])->name('admin.home')->middleware(CheckAdmin::class);

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');

Route::get('/products/fetch', [FrontController::class, 'productsFetch']);

Route::get('/products', [FrontController::class, 'products'])->name('home.products');
Route::get('products/{product}', [FrontController::class, 'product'])->name('home.products.show');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/password/reset', [PasswordRecoveryController::class, 'create'])->name('password.get');
Route::post('/password/reset', [PasswordRecoveryController::class, 'reset'])->name('password.post');
Route::get('/password/new', [PasswordRecoveryController::class, 'edit'])->name('password.edit');
Route::post('/password/new', [PasswordRecoveryController::class, 'update'])->name('password.update');

Route::get('/author', [FrontController::class, 'author'])->name('author');

Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    // cart
    Route::post('/cart', [CartController::class, 'store']);
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::put('/cart', [CartController::class, 'changeQuantity']);
    Route::delete('/cart', [CartController::class, 'destroy']);

    //orders
    Route::post('/order', [OrderController::class, 'store']);

});

Route::group(['prefix' => 'admin',  'middleware' => 'checkAdmin'], function() {
    Route::get('/products/fetch', [ProductController::class, 'fetchProducts']);
    Route::resource('/products', ProductController::class);

    Route::resource('/brands', BrandController::class);

    Route::get('/actions', [UserActionController::class, 'index'])->name('useractions.index');
    Route::get('/actions/filter', [UserActionController::class, 'filter']);

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::get('/docs', function() {
    return response()->file(public_path() . '/docs.pdf');
});
