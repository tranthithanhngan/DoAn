<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/trangchu.css') }}" > 
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
{{--  
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
     <link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet"> --}}
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
                    <li><a href= "">Sữa Aptamil</a></li>
                    <li><a href= "">Sữa Icreo-gloco</a></li>
                    <li><a href= "">Sữa Physiolac</a></li>
                    <li><a href= "">Sữa Blackmores</a></li>
                </ul>
            </li>
            <li><a href= "">Bột ăn dặm</a>
                <ul class="sub-menu">
                    <li><a href= "">Bột ăn dặm Gerber vị lúa</a></li>
                    <li><a href= "">Bột ngũ cốc súp lơ bông</a></li>
                    <li><a href= "">Bột mì Ý rau củ phô mai </a></li>
                    <li><a href= "">Bột dinh dưỡng HIPP</a></li>
                    <li><a href= "">Bột ăn dặm Ridielac Gold</a></li>
                    <li><a href= "">Cháo ăn dặm Mabu</a></li>
                    <li><a href= "">Bột ăn dặm Nestle</a></li>
                    <li><a href= "">Bột lúa mì vị bí ngô Fruto</a></li>
                </ul>
            </li>
            <li><a href= "" style="color: red">Đồ cho mẹ</a>
                <ul class="sub-menu">
                    <li><a href= "">Gối</a></li>
                    <li><a href= "">Thời trang bầu</a></li>
                    <li><a href= "">Ba lô bĩm sữa</a></li>
                    <li><a href= "">Máy hút sữa</a></li>
                    <li><a href= "">Túi trữ sữa</a></li>
                </ul></li>
            <li><a href= ""style="color: red">Tả & khăn</a>
                <ul class="sub-menu">
                    <li><a href= "">Tã - bĩm quần Merries</a></li>
                    <li><a href= "">Tã - bĩm quần GooN Mommy </a></li>
                    <li><a href= "">Tã - bĩm quần Smee </a></li>
                    <li><a href= "">Tã - bĩm quần KiyuKo </a></li>
                    <li><a href= "">Tã - bĩm quần GooN</a></li>
                    <li><a href= "">Giấy ướt IQ Baby</a></li>
                    <li><a href= "">Khăn vải khô đa năng AIKO</a></li>
                    <li><a href= "">Khăn ướt diệt khuẩn NUK</a></li>
                    <li><a href= "">Khăn ướt Molfix thiên nhiên</a></li>
                    <li><a href= "">Khăn ướt Bobby</a></li>
                    <li><a href= "">Khăn ướt Moony Nhật Bản</a></li>
                </ul>
            </li>
            <li><a href= "">Đồ chơi</a>
                <ul class="sub-menu">
                    <li><a href= "">Đồ chơi phát nhạc</a></li>
                    <li><a href= "">Đồ chơi gỗ </a></li>
                    <li><a href= "">Đồ chơi cho trẻ sơ sinh </a></li>
                    <li><a href= "">Đồ chơi nhà tắm </a></li>
                    <li><a href= "">Đồ chơi Lego</a></li>
                    <li><a href= "">Đồ chơi Búp bê</a></li>
                    <li><a href= "">Đồ chơi giáo dục</a></li>
                    <li><a href= "">Đồ chơi Lắp ráp - láp ghép</a></li>
                    <li><a href= "">Đồ chơi mô hình</a></li>
                    <li><a href= "">Đồ chơi điều khiển từ xa</a></li>
                    <li><a href= "">Đồ chơi nghề nghiệp</a></li>
                </ul>
            </li>
            <li><a href= "">Khác</a>
                <ul class="sub-menu">
                    <li><a href= "">Xe đẩy</a></li>
                    <li><a href= "">Nôi trẻ em </a></li>
                    <li><a href= "">Bình sữa</a></li>
                    <li><a href= "">Cắt móng trẻ em</a></li>
                    <li><a href= "">Máy hâm sửa</a></li>
                    <li><a href= "">Đai,địu giữ bé</a></li>
                    <li><a href= "">Dung dịch giặt đồ</a></li>
                
                </ul>
            </li>
        </div>
        <div class="timkiem">
            <li><input placeholder="Tìm Kiếm" type="text" ><i class="fas fa-search"></i></li>
            <li><a class="fa fa-paw" href=""></a></li>
            <li><a class="fa fa-user" href=""></a></li>
            <li><a class="fa fa-shopping-bag" href=""></a></li>
        </div>

    </header>
{{-- sản phẩm --}}
    <section class="sanpham">
     <div class="hiensanpham">
         <div class="sanpham-top row">
            <p>Trang Chủ </p><span>	 &#8594; </span><p> Sữa cho bé</p>

         </div>
        </div>  
        <div class="hiensanpham">
            <div class="row">
                <div class="sanpham-left">
                    <ul>
                        
                         <li class="sanpham-left-li "><a href="/thuonghieu/{{$iddanhmuc1->id}}">Sữa cho bé</a>
                        <ul>
                            @foreach($danhmuc_by_id as $key => $cate)
                                <div class="panel panel-default">
                                <div class="panel-heading" >
                                  <a style="margin:10px 0; color:cadetblue; " href="/sanpham/{{$cate->idthuonghieu}}"> <h4 style="font-weight:none!important;" class="panel-title">{{$cate->tenthuonghieu}}</a></h4>
                                </div>
                            </div>
                           
                            
                        @endforeach
                          
                        </ul>
                        </li> 
                        <li class="sanpham-left-li"><a href="#">Bột ăn dặm</a>
                            <ul>
                                @foreach($danhmuc_by_id as $key => $cate)
                           
                                <div class="panel panel-default">
                                <div class="panel-heading" style="margin-top: 10px; color:cadetblue;  ">
                                    <h4 style="font-weight:none!important;" class="panel-title">{{$cate->tenthuonghieu}}</a></h4>
                                </div>
                            </div>
                           
                            
                        @endforeach
                        </ul>
                        </li>
                        <li class="sanpham-left-li"><a href="#">Đồ cho mẹ</a>
                       <ul>
                        @foreach($danhmuc_by_id as $key => $cate)
                           
                        <div class="panel panel-default">
                        <div class="panel-heading" style="margin-top: 10px; color:cadetblue;  ">
                            <h4 style="font-weight:none!important;" class="panel-title">{{$cate->tenthuonghieu}}</a></h4>
                        </div>
                    </div>
                   
                    
                @endforeach
             </ul>
                        </li>
                        <li class="sanpham-left-li"><a href="#">Tả & khăn</a>
                        <ul>
                            @foreach($danhmuc_by_id as $key => $cate)
                           
                                <div class="panel panel-default">
                                <div class="panel-heading" style="margin-top: 10px; color:cadetblue;  ">
                                    <h4 style="font-weight:none!important;" class="panel-title">{{$cate->tenthuonghieu}}</a></h4>
                                </div>
                            </div>
                           
                            
                        @endforeach
                        </ul>
                        </li>
                        <li class="sanpham-left-li"><a href="#">Đồ chơi</a>
                            <ul >
                                @foreach($danhmuc_by_id as $key => $cate)
                           
                                <div class="panel panel-default">
                                <div class="panel-heading" style="margin-top: 10px; color:cadetblue;  ">
                                    <h4 style="font-weight:none!important;" class="panel-title">{{$cate->tenthuonghieu}}</a></h4>
                                </div>
                            </div>
                           
                            
                        @endforeach
                            </ul></li>
                        <li class="sanpham-left-li"><a href="#">Khác</a>
                            <ul >
                                @foreach($danhmuc_by_id as $key => $cate)
                           
                                <div class="panel panel-default">
                                <div class="panel-heading" style="margin-top: 10px; color:cadetblue;  ">
                                    <h4 style="font-weight:none!important;" class="panel-title">{{$cate->tenthuonghieu}}</a></h4>
                                </div>
                            </div>
                           
                            
                        @endforeach
                            </ul>
                        </li>
                       
                    </ul>
                </div>
                
              
                    
                <div class="sanpham-right row">
                    <div class="sanpham-right-top-item">
                        <p>Sữa EnPhaMil</p>
                    </div>
                    <div class="sanpham-right-top-item">
                        <button><span>Bộ lọc </span><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>
                    </div>
                    <div class="sanpham-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                    </div>
                    <div class="sanpham-right-content row">
                        <div class="sanpham-right-content-item">
                            @foreach($sanpham as $key => $sp)
                            <a href="/trangchuchitiet">
                            <img src="image/{{ $sp->hinhsanpham }}" alt="">
                            <h1>{{$sp->tensanpham }}</h1>
                            <p>{{ number_format($sp->giasanpham,0,',','.') }}đ</p>
                        </a>
                            @endforeach
                        </div>
                        <div class="sanpham-right-content-item">
                            <img src="image/suaenpha2.jpg" alt="">
                            <h1>Sữa EnPhaMil A+ 2</h1>
                            <p>700.000đ</p>
                            
                        </div>
                        <div class="sanpham-right-content-item">
                           <img src="image/suaenpha4.jpg" alt="">
                           <h1>Sữa EnPhaMil Gentle Care</h1>
                            <p>650.000đ</p>
                           
                        </div>
                        <div class="sanpham-right-content-item">
                           
                            <img src="image/suaenpha5.jpg" alt="">
                            <h1>Sữa EnPhaMil A+ NEURO PRO</h1>
                            <p>600.000đ</p>
                        </div>
                    
                        <div class="sanpham-right-content-item">
                            <img src="image/suaenpha.jpg" alt="">
                            <h1>Sữa EnPha</h1>
                            <p>600.000đ</p>
                            
                        </div>
                        <div class="sanpham-right-content-item">
                            <img src="image/suafrisolac.jpg" alt="">
                            <h1>Sữa FriSoLac</h1>
                            <p>700.000đ</p>
                            
                        </div>
                        <div class="sanpham-right-content-item">
                           <img src="image/suameiji.jpg" alt="">
                           <h1>Sữa MeJi</h1>
                            <p>650.000đ</p>
                           
                        </div>
                        <div class="sanpham-right-content-item">
                           
                            <img src="image/suaoptimum.jpg" alt="">
                            <h1>Sữa EnPha</h1>
                            <p>600.000đ</p>
                        </div>
                        <div class="sanpham-right-content-item">
                           
                            <img src="image/suaoptimum.jpg" alt="">
                            <h1>Sữa EnPha</h1>
                            <p>600.000đ</p>
                        </div>
                       
                       
                    </div>
                    
                    <div class="sanpham-right-bottom row">
                        <div class="sanpham-right-bottom-items">
                            <p> Hiển thị 2 <span>|</span>4 sản phẩm</p>
                        </div>
                        <div class="sanpham-right-bottom-items">
                            <p> <span>&laquo;</span> 1 2 3 4 5 <span>&raquo;</span> Trang cuối<span></span></p>
                        </div>
                    
                    </div>
                    </div>
               
           
            </div>
            <div class="col-sm-9 padding-right">

                @yield('content')
                 
             </div>
        </div>
        <div class="col-sm-9 padding-right">

            @yield('content')
             
         </div>
    </section>
    <div class="border"></div>
    

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
 {{-- xu li slide --}}

<script src="{{ asset('js/trangchusp.js') }}"defer></script>

<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/price-range.js')}}"></script>
<script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>


<script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function(){
      $('.send_order').click(function(){
          swal({
            title: "Xác nhận đơn hàng",
            text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Cảm ơn, Mua hàng",

              cancelButtonText: "Đóng,chưa mua",
              closeOnConfirm: false,
              closeOnCancel: false
          },
          function(isConfirm){
               if (isConfirm) {
                  var shipping_email = $('.shipping_email').val();
                  var shipping_name = $('.shipping_name').val();
                  var shipping_address = $('.shipping_address').val();
                  var shipping_phone = $('.shipping_phone').val();
                  var shipping_notes = $('.shipping_notes').val();
                  var shipping_method = $('.payment_select').val();
                  var order_fee = $('.order_fee').val();
                  var order_coupon = $('.order_coupon').val();
                  var _token = $('input[name="_token"]').val();

                  $.ajax({
                      url: '{{url('/confirm-order')}}',
                      method: 'POST',
                      data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                      success:function(){
                         swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                      }
                  });

                  window.setTimeout(function(){ 
                      location.reload();
                  } ,3000);

                } else {
                  swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                }
        
          });

         
      });
  });


</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.add-to-cart').click(function(){

          var id = $(this).data('id_product');
          // alert(id);
          var cart_product_id = $('.cart_product_id_' + id).val();
          var cart_product_name = $('.cart_product_name_' + id).val();
          var cart_product_image = $('.cart_product_image_' + id).val();
          var cart_product_quantity = $('.cart_product_quantity_' + id).val();
          var cart_product_price = $('.cart_product_price_' + id).val();
          var cart_product_qty = $('.cart_product_qty_' + id).val();
          var _token = $('input[name="_token"]').val();
          if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
              alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
          }else{

              $.ajax({
                  url: '{{url('/add-cart-ajax')}}',
                  method: 'POST',
                  data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                  success:function(){

                      swal({
                              title: "Đã thêm sản phẩm vào giỏ hàng",
                              text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                              showCancelButton: true,
                              cancelButtonText: "Xem tiếp",
                              confirmButtonClass: "btn-success",
                              confirmButtonText: "Đi đến giỏ hàng",
                              closeOnConfirm: false
                          },
                          function() {
                              window.location.href = "{{url('/gio-hang')}}";
                          });

                  }

              });
          }

          
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.choose').on('change',function(){
      var action = $(this).attr('id');
      var ma_id = $(this).val();
      var _token = $('input[name="_token"]').val();
      var result = '';
     
      if(action=='city'){
          result = 'province';
      }else{
          result = 'wards';
      }
      $.ajax({
          url : '{{url('/select-delivery-home')}}',
          method: 'POST',
          data:{action:action,ma_id:ma_id,_token:_token},
          success:function(data){
             $('#'+result).html(data);     
          }
      });
  });
  });
    
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $('.calculate_delivery').click(function(){
          var matp = $('.city').val();
          var maqh = $('.province').val();
          var xaid = $('.wards').val();
          var _token = $('input[name="_token"]').val();
          if(matp == '' && maqh =='' && xaid ==''){
              alert('Làm ơn chọn để tính phí vận chuyển');
          }else{
              $.ajax({
              url : '{{url('/calculate-fee')}}',
              method: 'POST',
              data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
              success:function(){
                 location.reload(); 
              }
              });
          } 
  });
});
</script>
 </html>