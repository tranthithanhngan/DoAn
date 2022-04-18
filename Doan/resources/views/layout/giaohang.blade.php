<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/trangchu.css') }}" > 
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
 
    <title>Trang Chủ</title>

</head>
<body>
    <header>
        <div class="hinhmevabe">
            <img class="image" src="image/ngan.jpg" >
        </div>
        <div class="menu">
            <li> <a href= "">Sữa cho bé</a>
                <ul class="sub-menu">
                    <li><a href= "">Sữa EnPha</a></li>
                    <li><a href= "">Sữa Frisolac</a></li>
                    <li><a href= "">Sữa Meji</a></li>
                    <li><a href= "">Sữa Optimum</a></li>
                </ul>
            </li>
            <li><a href= "">Bột ăn dặm</a></li>
            <li><a href= "" style="color: red">Sữa cho mẹ</a></li>
            <li><a href= ""style="color: red">Tả & khăn sữa</a> </li>
            <li><a href= "">Đồ chơi</a></li>
            <li><a href= "">Khác</a></li>
        </div>
        <div class="timkiem">
            <li><input placeholder="Tìm Kiếm" type="text" ><i class="fas fa-search"></i></li>
            <li><a class="fa fa-paw" href=""></a></li>
            <li><a class="fa fa-user" href=""></a></li>
            <li><a class="fa fa-shopping-bag" href=""></a></li>
        </div>

</header>
{{-- giao hàng --}}
<section class="giaohang">
    <div class="hiensanpham">
        <div class="giaohang-top-wrap">
        <div class="giaohang-top">
            <div class="giaohang-top-giaohang giaohang-top-item">
                <i class="fa fa-cart-plus " aria-hidden="true"></i>
            </div>
            <div class="giaohang-top-adress giaohang-top-item">
                <i class="fa fa-map-marker  " aria-hidden="true"></i>
            </div>
            <div class="giaohang-top-money giaohang-top-item">
                <i class="fa fa-money " aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="hiensanpham">
        <div class="giaohang-content row">
            <div class="giaohang-content-left">
                <p>Vui lòng chọn địa chỉ giao hàng</p>
                <div class="giaohang-content-left-dangnhap row">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    <p>Đăng nhập (Nếu bạn đã có tài khoản)</p>
                </div>
                <div class="giaohang-content-left-khachle row">
                    <input  name="loaikhach" type="radio">
                    <p><span style="font-weight:bold;"> Khách lẻ</span> (Nếu bạn không muốn lưu lại thông tin) </p>
                </div>
                <div class="giaohang-content-left-dangki row">
                    <input checked name="loaikhach" type="radio">
                    <p><span style="font-weight:bold;">Đăng ký</span> (Tạo mới tài khoản với thông tin bên dưới </p>
                </div>
                <div class="giaohang-content-left-input-top row">
                    <div class="giaohang-content-left-input-top-item">
                        <label for="">Họ và tên <span style="color: red">*</span></label>
                        <input type="text">
                    </div>
                    <div class="giaohang-content-left-input-top-item">
                        <label for="">Điện thoại <span style="color: red">*</span></label>
                        <input type="text">
                    </div>
                    <div class="giaohang-content-left-input-top-item">
                        <label for="">Tỉnh/Tp <span style="color: red">*</span></label>
                        <input type="text">
                    </div>
                    <div class="giaohang-content-left-input-top-item">
                        <label for="">Quận/Huyện <span style="color: red">*</span></label>
                        <input type="text">
                    </div>
                    <div class="giaohang-content-left-input-bottom">
                        <label for="">Địa chỉ <span style="color: red">*</span></label>
                        <input type="text">
                    </div>
                   
                </div>
                <div class="giaohang-content-left-button row">
                    <a href=""><span>&#8249; &#8249;</span>Quay lại giỏ hàng</a>
                <button><p style="font-weight:bold;">THANH TOÁN VÀ ĐẶT HÀNG</p></button>
                </div>
            </div>
            <div class="giaohang-content-right">
                <table>
                    <tr>
                        <th> Tên sản phẩm</th>
                        <th> Giảm giá</th>
                        <th> Số lượng</th>
                        <th> Thành tiền</th>
                    </tr>
                    <tr>
                        <td>Sữa EnPhaMilk</td>
                        <td>-30%</td>
                        <td>1</td>
                        <td><p> 500.000đ</p></td>
                    </tr>
                    <tr>
                        <td>Sữa Optimum</td>
                        <td>-20%</td>
                        <td>1</td>
                        <td><p> 550.000đ</p></td>
                    </tr>
                    <tr>
                       
                        <td style="font-weight:bold;" colspan="3">Tổng</td>
                        <td style="font-weight:bold;">1.050.000đ</td>
                    </tr>
                    <tr>
                       
                        <td style="font-weight:bold;" colspan="3">Thuế VAT</td>
                        <td style="font-weight:bold;">50.000đ</td>
                    </tr>
                    <tr>
                       
                        <td style="font-weight:bold;" colspan="3">Tổng tiền hàng</td>
                        <td style="font-weight:bold;">1.100.000đ</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>

</section>

<section class="app">
    <p>Tải ứng dụng Mẹ Và Bé </p>
    <div class=" app-google">
        <img src="image/appstore.jpg">
        <img src="image/chplay.jpg">
    
    </div>
    <p> Nhận bản tin Mẹ Và Bé </p>
    <input type ="text" placeholder="Nhập email của bạn...">
</section>
    <div class="footer-top">
        <li><a href=""><img src="image/check.jpg"></a></li>
        <li><a href="">Liên hệ</a></li>
        <li><a href="">Tuyển dụng</a></li>
        <li><a href="">Giới thiệu</a></li>
        <li>
            <a href="" class=" fab fa-facebook-f "></a>
            <a href="" class=" fab fa-twitter "></a>
            <a href="" class=" fab fa-youtube "></a>
        </li>
        </div>
        <div class="footer-center">
            <p>
                Công ty cổ phần Dự Kim với số đăng kí kinh doanh: 0372014217<br>
                Địa chỉ đăng kí: 450 Lê Văn Việt,P. Tăng Nhơn Phú A, Tp.Thủ Đức<br>
                Đặt hàng online:<b> 0372014217</b>.</p>
        </div>
        
        <div class="footer-bottom">
            ©MeVaBe All rights reserved
        
        </div>
 </body>
 

<script src="{{ asset('js/trangchusp.js') }}"defer></script>


 </html>