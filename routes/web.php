<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\SellerLoginController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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
/*AUTH ROUTES*/
Auth::routes();
Route::get('/adminLogin',[AdminLoginController::class,'showLoginForm'])->name('adminLoginForm');
Route::post('/adminLoginSubmit',[AdminLoginController::class,'login'])->name('submitAdminLogin');
Route::get('/sellerLogin',[SellerLoginController::class,'showLoginForm'])->name('adminLoginForm');
Route::post('/sellerLoginSubmit',[SellerLoginController::class,'login'])->name('submitSellerLogin');


/*USER ROUTES*/
Route::get('/', function () {
    $products = Product::inRandomOrder()->take(10)->get();
    return view('landingPage',[
        'products' => $products
    ]);
});
Route::get('/product/{product}',[UserController::class,'productView'])->name('productView');
Route::get('/women',[UserController::class,'womenProducts'])->name('women');
Route::get('/men',[UserController::class,'menProducts'])->name('men');
Route::get('/kids',[UserController::class,'kidsProducts'])->name('kids');
Route::get('/cart',[UserController::class,'userCart'])->name('cart');
Route::post('/addToCart',[UserController::class,'addToCart'])->name('addToCart');
Route::delete('/removeFromCart/{cartItem}',[UserController::class,'removeFromCart'])->name('removeFromCart');
Route::post('/addWish',[UserController::class,'addToWishList'])->name('addToWishList');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart',[UserController::class,'userCart'])->name('cart');
Route::post('/orderItems',[UserController::class,'orderItems'])->name('order');
Route::get('/confirmOrder',[UserController::class,'confirmOrder'])->name('confirmOrder');
Route::post('/order',[UserController::class,'order'])->name('order');
Route::post('/lipaNaMpesa',[UserController::class,'lipaNaMpesa'])->name('lipaNaMpesa');
Route::get('/malipo/{orderId}',[UserController::class,'malipo'])->name('malipo');

/*SELLER ROUTES*/
Route::get('/seller',[SellerController::class,'index'])->name('seller');

/*ADMIN ROUTES*/
Route::get('/admin',[AdminController::class,'index'])->name('admin');

/*user routes*/
Route::get('/admin/users',[AdminController::class,'viewUsers'])->name('viewUsers');
Route::get('/admin/users/register',[AdminController::class,'addNewUser'])->name('addNewUser');
Route::post('/admin/users/add',[AdminController::class,'registerUser'])->name('registerUser');
Route::get('/admin/editUser/{user}',[AdminController::class,'editUser'])->name('editUser');
Route::put('/admin/updateUser/{user}',[AdminController::class,'updateUser'])->name('updateUser');
Route::delete('/admin/deleteUser/{user}',[AdminController::class,'deleteUser'])->name('deleteUser');

/*seller routes*/
Route::get('/admin/sellers',[AdminController::class,'viewSellers'])->name('viewSellers');
Route::get('/admin/sellers/register',[AdminController::class,'addNewSeller'])->name('addNewSeller');
Route::post('/admin/sellers/add',[AdminController::class,'registerSeller'])->name('registerSeller');
Route::get('/admin/editSeller/{seller}',[AdminController::class,'editSeller'])->name('editSeller');
Route::put('/admin/updateSeller/{seller}',[AdminController::class,'updateSeller'])->name('updateSeller');
Route::delete('/admin/deleteSeller/{seller}',[AdminController::class,'deleteSeller'])->name('deleteSeller');

/*product routes*/
Route::get('/admin/products',[AdminController::class,'viewProducts'])->name('viewProducts');
Route::get('/admin/products/new',[AdminController::class,'addNewProduct'])->name('addNewProduct');
Route::post('/admin/products/add',[AdminController::class,'addProduct'])->name('addProduct');
Route::get('/admin/editProduct/{product}',[AdminController::class,'editProduct'])->name('editProduct');
Route::put('/admin/updateProduct/{product}',[AdminController::class,'updateProduct'])->name('updateProduct');
Route::delete('/admin/deleteProduct/{product}',[AdminController::class,'deleteProduct'])->name('deleteProduct');


