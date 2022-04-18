<?php

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


Route::get('/trangchu', 'App\Http\Controllers\DoanController@index')->name('doan.trangchu');
Route::get('/trangchuchitiet', 'App\Http\Controllers\DoanController@create');
// show thuong hiệu theo danhmuc
Route::get('/danh-muc/{iddanhmuc}','App\Http\Controllers\DanhmucController@showthuonghieudanhmuc');
Route::get('/thuong-hieu/{idthuonghieu}','App\Http\Controllers\ThuonghieuController@showsanphamthuonghieu');
Route::get('/chi-tiet/{idsp}','App\Http\Controllers\SanphamController@chitietsanpham');

//giohang
Route::post('/giohang','App\Http\Controllers\GiohangController@luugiohang');
Route::get('/showgiohang','App\Http\Controllers\GiohangController@showgiohang');
Route::get('/xoagiohang/{rowId}','App\Http\Controllers\GiohangController@xoagiohang');
Route::post('/capnhatgiohang','App\Http\Controllers\GiohangController@capnhatgiohang');

//checkout
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/dangki','App\Http\Controllers\CheckoutController@dangki');
Route::post('/dangnhap','App\Http\Controllers\CheckoutController@dangnhap');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::post('/dangkithongtin','App\Http\Controllers\CheckoutController@dangkithongtin');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/dathang','App\Http\Controllers\CheckoutController@dathang');

Route::post('/doan/store', [App\Http\Controllers\AdminController::class, 'store'])->name('doan.store');
Route::get('/show' , 'App\Http\Controllers\AdminController@show');

//đăng nhập, đăng xuất
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::get('/login', 'App\Http\Controllers\AdminController@login');
Route::post('/trangchuadmin', 'App\Http\Controllers\AdminController@dashboard');
Route::get('/trangadmin','App\Http\Controllers\AdminController@show_dashboard');


//Thêm danh muc
Route::get('/themdanhmuc','App\Http\Controllers\DanhmucController@themdanhmuc');
Route::post('/luudanhmuc','App\Http\Controllers\DanhmucController@luudanhmuc');

//liệt kê danh mục
Route::get('/showdanhmuc','App\Http\Controllers\DanhmucController@showdanhmuc');
//sửa danh mục
Route::get('/suadanhmuc/{id}','App\Http\Controllers\DanhmucController@suadanhmuc');
Route::post('/capnhatdanhmuc/{id}','App\Http\Controllers\DanhmucController@capnhatdanhmuc');
Route::get('/xoadanhmuc/{id}','App\Http\Controllers\DanhmucController@xoadanhmuc');

//thêm thương hiệu
Route::get('/themthuonghieu','App\Http\Controllers\ThuonghieuController@themthuonghieu');
Route::post('/luuthuonghieu','App\Http\Controllers\ThuonghieuController@luuthuonghieu');

//liệt kê thương hiệu
Route::get('/showthuonghieu','App\Http\Controllers\ThuonghieuController@showthuonghieu');
//sửa thương hiệu
Route::get('/suathuonghieu/{idthuonghieu}','App\Http\Controllers\ThuonghieuController@suathuonghieu');
Route::post('/capnhatthuonghieu/{idthuonghieu}','App\Http\Controllers\ThuonghieuController@capnhatthuonghieu');
Route::get('/xoathuonghieu/{idthuonghieu}','App\Http\Controllers\ThuonghieuController@xoathuonghieu');

//thêm sản phẩm
Route::get('/themsanpham','App\Http\Controllers\SanphamController@themsanpham');
Route::post('/luusanpham','App\Http\Controllers\SanphamController@luusanpham');

//liệt kê sản phẩm
Route::get('/showsanpham','App\Http\Controllers\SanphamController@showsanpham');
//sửa sản phẩm
Route::get('/suasanpham/{idsanpham}','App\Http\Controllers\SanphamController@suasanpham');
Route::post('/capnhatsanpham/{idsanpham}','App\Http\Controllers\SanphamController@capnhatsanpham');
Route::get('/xoasanpham/{idsanpham}','App\Http\Controllers\SanphamController@xoasanpham');