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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'App\Http\Controllers\DoanController@index')->name('doan.trangchu');
Route::get('/trangchuchitiet', 'App\Http\Controllers\DoanController@create');
Route::post('/tim-kiem','App\Http\Controllers\DoanController@timkiem');
//Đơn hàng
Route::get('/donhang','App\Http\Controllers\DonhangController@donhang');
Route::get('/xemdonhang/{order_id}','App\Http\Controllers\DonhangController@xemdonhang');
Route::get('/xoadonhang/{order_id}','App\Http\Controllers\DonhangController@xoadonhang');
Route::get('/indonhang/{order_id}','App\Http\Controllers\DonhangController@indonhang');
Route::post('/update-order-qty','App\Http\Controllers\DonhangController@update_order_qty');
Route::post('/update-qty','App\Http\Controllers\DonhangController@update_qty');


Route::post('/add-cart-ajax','App\Http\Controllers\GiohangController@add_cart_ajax');
//send mail
Route::get('/sendmail','App\Http\Controllers\DoanController@sendmail');


// show thuong hiệu theo danhmuc
Route::get('/danh-muc/{iddanhmuc}','App\Http\Controllers\DanhmucController@showthuonghieudanhmuc');
Route::get('/thuong-hieu/{idthuonghieu}','App\Http\Controllers\ThuonghieuController@showsanphamthuonghieu');
Route::get('/chi-tiet/{idsp}','App\Http\Controllers\SanphamController@chitietsanpham');

//giohang
Route::post('/giohang','App\Http\Controllers\GiohangController@luugiohang');
Route::get('/showgiohang','App\Http\Controllers\GiohangController@showgiohang');
Route::get('/xoagiohang/{rowId}','App\Http\Controllers\GiohangController@xoagiohang');
// Route::post('/capnhatgiohang2','App\Http\Controllers\GiohangController@capnhatgiohang2');
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
Route::post('/confirm-order','App\Http\Controllers\CheckoutController@confirm_order');

Route::post('/doan/store', [App\Http\Controllers\AdminController::class, 'store'])->name('doan.store');
Route::get('/show' , 'App\Http\Controllers\AdminController@show');

//đăng nhập, đăng xuất
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::get('/login', 'App\Http\Controllers\AdminController@login');
Route::post('/trangchuaadmin', 'App\Http\Controllers\AdminController@dashboard');
Route::get('/trangadmin','App\Http\Controllers\AdminController@show_dashboard');

//login fb
Route::get('/login-facebook','App\Http\Controllers\AdminController@login_facebook');
Route::get('/login/callback','App\Http\Controllers\AdminController@callback_facebook');
Route::get('/login-google','App\Http\Controllers\AdminController@login_google');
Route::get('/google/callback','App\Http\Controllers\AdminController@callback_google');

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




//slides
Route::get('/lietkeslides','App\Http\Controllers\SliderController@lietkeslides');
Route::get('/themslides','App\Http\Controllers\SliderController@themslides');
Route::post('/them-slider','App\Http\Controllers\SliderController@them_slider');
Route::get('/unactive-slide/{slide_id}','App\Http\Controllers\SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','App\Http\Controllers\SliderController@active_slide');
Route::get('/delete-slide/{slide_id}','App\Http\Controllers\SliderController@delete_slide');


//baiviet
Route::get('/thembaiviet','App\Http\Controllers\BaivietController@thembaiviet');
Route::post('/them-baiviet','App\Http\Controllers\BaivietController@them_baiviet');
Route::get('/showbaiviet','App\Http\Controllers\BaivietController@showbaiviet');
Route::get('/suabaiviet/{baiviet_id}','App\Http\Controllers\BaivietController@suabaiviet');
Route::post('/capnhatbaiviet/{baiviet_id}','App\Http\Controllers\BaivietController@capnhatbaiviet');
Route::get('/deletebaiviet/{baiviet_id}','App\Http\Controllers\BaivietController@deletebaiviet');
Route::get('/baiviet/{baiviet_id}','App\Http\Controllers\BaivietController@showdanhmucbaiviet');


//baivietchitiet
Route::get('/thembaivietchitiet','App\Http\Controllers\BaivietController@thembaivietchitiet');
Route::post('/them-baivietchitiet','App\Http\Controllers\BaivietController@them_baivietchitiet');
Route::get('/showbaivietchitiet','App\Http\Controllers\BaivietController@showbaivietchitiet');
Route::get('/suabaivietchitiet/{baiviet_id}','App\Http\Controllers\BaivietController@suabaivietchitiet');
Route::post('/capnhatbaivietchitiet/{baiviet_id}','App\Http\Controllers\BaivietController@capnhatbaivietchitiet');
Route::get('/deletebaivietchitiet/{baiviet_id}','App\Http\Controllers\BaivietController@deletebaivietchitiet');
Route::get('/xembaiviet/{baiviet_id}','App\Http\Controllers\BaivietController@xembaiviet');