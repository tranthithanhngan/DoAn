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
Route::get('/del-all-product','App\Http\Controllers\GiohangController@delete_all_product');
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
Route::get('/showgiohangmenu','App\Http\Controllers\GiohangController@showgiohangmenu');
Route::post('/capnhatgiohang','App\Http\Controllers\GiohangController@capnhatgiohang');
Route::post('/update-cart','App\Http\Controllers\GiohangController@update_cart');
Route::get('/gio-hang','App\Http\Controllers\GiohangController@gio_hang');


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
Route::get('/trangadmin','App\Http\Controllers\AdminController@show_dashboard')->name('admin');

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
// Route::group(['middleware' => 'auth.roles', 'auth.roles'=>['admin','author']], function () {
Route::get('/themsanpham','App\Http\Controllers\SanphamController@themsanpham');
Route::get('/suasanpham/{idsanpham}','App\Http\Controllers\SanphamController@suasanpham');
// });
Route::post('/luusanpham','App\Http\Controllers\SanphamController@luusanpham');

//liệt kê sản phẩm
Route::get('/showsanpham','App\Http\Controllers\SanphamController@showsanpham');
Route::get('/showkhohang','App\Http\Controllers\SanphamController@showkhohang');

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

//thuvienanh
Route::get('/themanh/{idsanpahm}','App\Http\Controllers\ThuvienanhController@themanh');
Route::post('/select-hinhanh','App\Http\Controllers\ThuvienanhController@select_hinhanh');
Route::post('/insert_hinhanh/{hinhanh_id}','App\Http\Controllers\ThuvienanhController@insert_hinhanh');
Route::post('/update-hinhanh','App\Http\Controllers\ThuvienanhController@update_hinhanh');
Route::post('/delete-hinhanh','App\Http\Controllers\ThuvienanhController@delete_hinhanh');
Route::post('/capnhat-hinhanh','App\Http\Controllers\ThuvienanhController@capnhat_hinhanh');


Route::post('/load-commnet','App\Http\Controllers\SanphamController@load_commnet');
Route::get('/showbinhluan','App\Http\Controllers\SanphamController@showbinhluan');
Route::post('/send-comment','App\Http\Controllers\SanphamController@send_comment');
Route::post('/duyet-comment','App\Http\Controllers\SanphamController@duyet_comment');
Route::post('/traloi-comment','App\Http\Controllers\SanphamController@traloi_comment');
Route::post('/themsao','App\Http\Controllers\SanphamController@themsao');

//trang liên hệ

Route::get('/lienhe','App\Http\Controllers\LienheController@lienhe');
Route::get('/tranglienhe','App\Http\Controllers\LienheController@tranglienhe');
Route::post('/luulienhe','App\Http\Controllers\LienheController@luulienhe');
Route::post('/capnhatlienhe','App\Http\Controllers\LienheController@capnhatlienhe');

Route::post('/locketqua','App\Http\Controllers\DoanController@locketqua');
Route::post('/dashboard-filter','App\Http\Controllers\DoanController@dashboard_filter');
Route::post('/thangngay','App\Http\Controllers\DoanController@thangngay');

//lấy lại mk
Route::get('/quenmatkhau','App\Http\Controllers\CheckoutController@quenmatkhau');
Route::post('/laylaimk','App\Http\Controllers\CheckoutController@laylaimk');
Route::get('/updatemkmail','App\Http\Controllers\CheckoutController@updatemkmail');
Route::post('/update-new-password','App\Http\Controllers\CheckoutController@update_new_password');




//phân quyền
Route::group(['middleware'=>'auth.roles'],function(){
Route::get('/users','App\Http\Controllers\PhanquyenController@lietkeusers');
});
Route::get('/logindangki','App\Http\Controllers\PhanquyenController@logindangki');
Route::post('/dangki','App\Http\Controllers\PhanquyenController@dangki');
Route::post('/assign-roles','App\Http\Controllers\PhanquyenController@assign_roles');
Route::get('/xoa_roles/{admin_id}','App\Http\Controllers\PhanquyenController@xoa_roles');
Route::get('/chuyen_roles/{admin_id}','App\Http\Controllers\PhanquyenController@chuyen_roles');
Route::get('/themusers','App\Http\Controllers\PhanquyenController@themusers');
Route::post('/luuuser','App\Http\Controllers\PhanquyenController@luuuser');


//lịch sử đơn hàng
Route::get('/lichsu','App\Http\Controllers\DonhangController@lichsu');
Route::get('/view-lichsudonhang/{order_id}','App\Http\Controllers\DonhangController@view_lichsudonhang');


//Ngôn ngữ
Route::get('lang/{locale}',function($locate){
    if(! in_array($locate, ['en','vi'])){
        abort(404);
    }
    session()->put('locale',$locate);
    return redirect()->back();
});

//khohang
Route::get('/suakhohang/{idsanpham}','App\Http\Controllers\SanphamController@suakhohang');
Route::post('/capnhatkhohang/{idsanpham}','App\Http\Controllers\SanphamController@capnhatkhohang');
Route::get('/xoakhohang/{idsanpham}','App\Http\Controllers\SanphamController@xoakhohang');

//load sản phẩm
Route::post('/loadsanpham','App\Http\Controllers\DoanController@loadsanpham');

//HUỷ đơn hàng
Route::post('/huy-don-hang','App\Http\Controllers\DonhangController@huydonhang');

//thanh toán vnpay
Route::post('/vnpay','App\Http\Controllers\CheckoutController@vnpay');
Route::post('/momo','App\Http\Controllers\CheckoutController@momo');
Route::post('/onepay','App\Http\Controllers\CheckoutController@onepay');

Route::get('/loginfb','App\Http\Controllers\DoanController@loadfb');
Route::get('/customer/facebook/callback','App\Http\Controllers\DoanController@customer_facebook_callback');

Route::get('/show_quick_cart','App\Http\Controllers\DoanController@show_quick_cart');
Route::get('/del-product/{session_id}','App\Http\Controllers\GiohangController@delete_product');
Route::post('/update-cart1','App\Http\Controllers\GiohangController@update_cart1');

//vận chuyển
Route::get('/vanchuyen','App\Http\Controllers\VanchuyenController@vanchuyen');
Route::post('/select-delivery','App\Http\Controllers\VanchuyenController@select_delivery');
Route::post('/insert-delivery','App\Http\Controllers\VanchuyenController@insert_delivery');
Route::post('/select-feeship','App\Http\Controllers\VanchuyenController@select_feeship');
Route::post('/update-delivery','App\Http\Controllers\VanchuyenController@update_delivery');
Route::post('/select-delivery-home','App\Http\Controllers\VanchuyenController@select_delivery_home');
Route::post('/calculate-fee','App\Http\Controllers\VanchuyenController@calculate_fee');
Route::get('/del-fee','App\Http\Controllers\VanchuyenController@del_fee');