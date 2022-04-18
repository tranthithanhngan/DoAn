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
{{-- thanh toán --}}
<section class="thanhtoan">
    <div class="hiensanpham">
        <div class="thanhtoan-top-wrap">
        <div class="thanhtoan-top">
            <div class="thanhtoan-top-thanhtoan thanhtoan-top-item">
                <i class="fa fa-cart-plus " aria-hidden="true"></i>
            </div>
            <div class="thanhtoan-top-adress thanhtoan-top-item">
                <i class="fa fa-map-marker  " aria-hidden="true"></i>
            </div>
            <div class="thanhtoan-top-money thanhtoan-top-item">
                <i class="fa fa-money " aria-hidden="true"></i>
            </div>
        </div>
    </div>
    </div>
    <div class="hiensanpham">
        <div class="thanhtoan-content row">
            <div class="thanhtoan-content-left">
                <div class="thanhtoan-content-left-method-giaohang">
                    <p style="font-weight:bold">Phương thức giao hàng</p>
                    <div class="thanhtoan-content-left-method-giaohang-item">
                        <input checked type="radio"name="" id="">
                        <label for="">Giao hàng chuyển phát nhanh</label>
                    </div>
                </div>
                <div class="thanhtoan-content-left-method-thanhtoan">
                    <p style="font-weight:bold">Phương thức thanh toán</p>
                    <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                    <div class="thanhtoan-content-left-method-thanhtoan-item">
                        <input type="radio" name="method-thanhtoan" id="">
                        <label for="">Thanh toán bằng thẻ tín dụng (Onepay).</label>
                    </div>
                    <div class="thanhtoan-content-left-method-thanhtoan-item-img">
                        <img src="image/visa.png" alt="">
                    </div>
                    <div class="thanhtoan-content-left-method-thanhtoan-item">
                        <input checked type="radio" name="method-thanhtoan" id="">
                        <label for="">Thanh toán bằng thẻ ATM(Onepay)</label>
                    </div>
                    <br>
                    <div class="thanhtoan-content-left-method-thanhtoan-item-img">
                        <img src="image/nganhang.jpg" alt="">
                    </div>
                    <br>
                    <div class="thanhtoan-content-left-method-thanhtoan-item">
                        <input type="radio" name="method-thanhtoan" id="">
                        <label for="">Thanh toán bằng MoMo</label>
                    </div>
                    <br>
                    <div class="thanhtoan-content-left-method-thanhtoan-item-img">
                        <img src="image/momo.jpg" alt="">
                    </div>
                    <br>
                    <div class="thanhtoan-content-left-method-thanhtoan-item">
                        <input type="radio" name="method-thanhtoan" id="">
                        <label for="">Thanh toán tận nơi</label>
                    </div>
                </div>
                
            </div>
            <div class="thanhtoan-content-right">
                <div class="thanhtoan-content-right-button">
                    <input type="text" name="" id="" placeholder="Mã giảm giá/Quà tặng">
               <button><i class="fa fa-check" aria-hidden="true"></i></button>
                </div>
                <div class="thanhtoan-content-right-button">
                    <input type="text" name="" id="" placeholder="Mã cộng tác viên">
               <button><i class="fa fa-check" aria-hidden="true"></i></button>
                </div>
                <div class="thanhtoan-content-right-mnv">
                    <select name="" id="">
                        <option value="">Chọn mã nhân viên thân thiết</option>
                        <option value="">O345</option>
                        <option value="">A345</option>
                        <option value="">E345</option>
                        <option value="">B345/option>
                    </select>
                   
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
        <div class="thanhtoan-content-right-thanhtoan">
            <button>TIẾP TỤC THANH TOÁN</button>
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