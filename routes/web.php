<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('landingPage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
Route::get('/admin/editProduct/{Product}',[AdminController::class],'editProduct')->name('editProduct');
Route::put('/admin/updateProduct/{Product}',[AdminController::class],'updateProduct')->name('updateProduct');
Route::delete('/admin/deleteProduct/{Product}',[AdminController::class],'deleteProduct')->name('deleteProduct');
