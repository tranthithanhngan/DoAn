<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />
    
      {{-- <meta property="og:image" content="{{$image_og}}" />   --}}
      <meta property="og:site_name" content="http://127.0.0.1:8000/" />
      <meta property="og:description" content="{{$meta_desc}}" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:url" content="{{$url_canonical}}" />
      <meta property="og:type" content="website" />
    <!--//-------Seo--------->
    <title>{{$meta_title}}</title>
  
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettify.css')}}" rel="stylesheet">
   
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
     <link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">
   
     <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    {{-- <link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> --}}
</head><!--/head-->

<body>

    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0932023992</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> webmevabe.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/"><img src="{{('http://127.0.0.1:8000/image/ngan.jpg')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                 @lang('lang.languge')
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{URL::to('lang/en')}}">Tiếng Anh</a></li>
                                    <li><a href="{{URL::to('lang/vi')}}">Tiếng Việt</a></li>
                                </ul>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                               
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id');
                                if($customer_id!=NULL && $shipping_id==NULL){ 
                              ?>
                               <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                             
                             <?php
                              }elseif($customer_id!=NULL && $shipping_id!=NULL){
                              ?>
                              <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                              <?php 
                             }else{
                             ?>
                              <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                             <?php
                              }
                             ?>
                             
                             <style type="text/css">
                                span#show-cart li{
                                    margin-top: 9px;
                                }
                                </style>
                               <span id="show-cart"></span>

                             {{-- <li><a href="{{URL::to('/showgiohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li> --}}
                             <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id!=NULL){ 
                              ?>
                               <li><a href="{{URL::to('/lichsu')}}"><i class="fa fa-lock"></i> Lịch sử đơn hàng</a></li>
                          
                             <?php
                         }
                              ?>


                            <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id!=NULL){ 
                            ?>
                            <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>

                            <?php
                            }else{
                            ?>
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                            <?php 
                            }
                            ?>

                    {{-- <li><a href="{{URL::to('/lichsu')}}"><i class="fa fa-shopping-cart"></i> Lịch sử</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Danh mục <i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($danhmuc as $key => $cate)
                                        <li><a href="{{URL::to('/danh-muc/'.$cate->id)}}">{{$cate->tendanhmuc}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($baiviet as $key => $cate)
                                        <li><a href="{{URL::to('/baiviet/'.$cate->baiviet_id)}}">{{$cate->baiviet_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li><a href="/gio-hang">Giỏ hàng</a></li>
                                <li><a href="/lienhe">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        <style type="text/css">
                            img.img.img-responsive.img-slider {
                                height: 350px;
                            }
                        </style>
                        <div class="carousel-inner">
                        @php 
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php 
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                                
                                <div class="col-sm-12">
                                    <img alt="{{$slide->slider_desc}}" src="{{asset('image/'.$slide->slider_image)}}" height="200" width="100%" class="img img-responsive img-slider">
                                   
                                </div>
                            </div>
                        @endforeach  
                          
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                          @foreach($danhmuc as $key => $cate)
                           
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc/'.$cate->id)}}">{{$cate->tendanhmuc}}</a></h4>
                                </div>
                            </div>
                        @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products row"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                {{-- <ul class="nav nav-pills nav-stacked">
                                    @foreach($thuonghieu as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu/'.$brand->idthuonghieu)}}"> <span class="pull-right"></span>{{$brand->tenthuonghieu}}</a></li>
                                    @endforeach
                                </ul> --}}
                            </div>

                        </div>
                        
                         <div class="Yeuthich_products row">
                            <h2>Sản phẩm yêu thích</h2>
                            <div class="yeuthich-name">
                               <div id="row_wishlist" class="row">
                                   
                               </div>
                            </div>
                            
                        </div>
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    
                    <div class="table-agile-info">
  
                        <div class="panel panel-default">
                          <div class="panel-heading">
                           Xem chi tiết đơn hàng đã đặt {{$order_id}}
                          </div>
                          
                          <div class="table-responsive">
                                            <?php
                                                  $message = Session::get('message');
                                                  if($message){
                                                      echo '<span class="text-alert">'.$message.'</span>';
                                                      Session::put('message',null);
                                                  }
                                                  ?>
                            <table class="table table-striped b-t b-light">
                              <thead>
                                <tr>
                                 
                                  <th>Tên khách hàng</th>
                                  <th>Số điện thoại</th>
                                  <th>Email</th>
                                  
                                  <th style="width:30px;"></th>
                                </tr>
                              </thead>
                              <tbody>
                              
                                <tr>
                                  <td>{{$nguoidung->customer_name}}</td>
                                  <td>{{$nguoidung->customer_phone}}</td>
                                  <td>{{$nguoidung->customer_email}}</td>
                                </tr>
                           
                              </tbody>
                            </table>
                      
                          </div>
                         
                        </div>
                      </div>
                      <br>
                      <div class="table-agile-info">
                        
                        <div class="panel panel-default">
                          <div class="panel-heading">
                           Thông tin người nhận hàng
                          </div>
                          
                          
                          <div class="table-responsive">
                                            <?php
                                                  $message = Session::get('message');
                                                  if($message){
                                                      echo '<span class="text-alert">'.$message.'</span>';
                                                      Session::put('message',null);
                                                  }
                                                  ?>
                            <table class="table table-striped b-t b-light">
                              <thead>
                                <tr>
                                 
                                  <th>Tên người nhận hàng</th>
                                  <th>Địa chỉ</th>
                                  <th>Số điện thoại</th>
                                  <th>Email</th>
                                  <th>Ghi chú</th>
                                  <th>Hình thức thanh toán</th>
                                
                                  
                                  <th style="width:30px;"></th>
                                </tr>
                              </thead>
                              <tbody>
                              
                                <tr>
                                 
                                  <td>{{$ship->shipping_name}}</td>
                                  <td>{{$ship->shipping_address}}</td>
                                   <td>{{$ship->shipping_phone}}</td>
                                   <td>{{$ship->shipping_email}}</td>
                                   <td>{{$ship->shipping_notes}}</td>
                                   <td>@if($ship->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
                                  
                                
                                </tr>
                           
                              </tbody>
                            </table>
                      
                          </div>
                         
                        </div>
                      </div>
                      <br><br>
                      
                      <div class="table-agile-info">
                        
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            Liệt kê chi tiết đơn hàng 
                          </div>
                         
                          <div class="table-responsive">
                                            <?php
                                                  $message = Session::get('message');
                                                  if($message){
                                                      echo '<span class="text-alert">'.$message.'</span>';
                                                      Session::put('message',null);
                                                  }
                                                  ?>
                          
                            <table class="table table-striped b-t b-light">
                              <thead>
                                <tr>
                                  <th style="width:20px;">
                                    <label class="i-checks m-b-none">
                                      <input type="checkbox"><i></i>
                                    </label>
                                  </th>
                                  <th>Tên sản phẩm</th>
                                  <th>Số lượng kho còn</th>
                                  <th>Mã giảm giá</th>
                                  <th>Phí ship hàng</th>
                                  <th>Số lượng</th>
                                  <th>Giá sản phẩm</th>
                                  <th>Tổng tiền</th>
                                  
                                  <th style="width:30px;"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @php 
                                $i = 0;
                                $total = 0;
                                @endphp
                              @foreach($donhang_chitiet as $key => $details)
                      
                                @php 
                                $i++;
                                $subtotal = (int)$details->giasanpham*(int)$details->product_sales_quantity;
                                $total= $total+ $subtotal;
                            
                             
                                @endphp
                                <tr class="color_qty_{{$details->idsanpham}}">
                                 
                                  <td><i>{{$i}}</i></td>
                                  <td>{{$details->tensanpham}}</td>
                                  <td>{{$details->sanpham->slsanpham}}</td>
                                  <td>@if($details->product_coupon!='no')
                                        {{$details->product_coupon}}
                                      @else 
                                        Không mã
                                      @endif
                                  </td>
                                  <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
                                  <td>
                      
                                    <input type="number" readonly min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->idsanpham}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">
                      
                                    <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->idsanpham}}" value="{{$details->sanpham->slsanpham}}">
                      
                                    <input type="hidden" name="order_code" class="order_code" value="{{$details->order_id}}">
                      
                                    <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->idsanpham}}">
                      
                                  
                                  </td>
                                  <td>{{number_format((float)$details->giasanpham ,0,',','.')}}.000VNĐ</td>
                                  <td>{{number_format($subtotal ,0,',','.')}}.000VNĐ</td>
                                </tr>
                                @endforeach
                                <tr>
                                  <td colspan="2">  
                                  @php 
                                      $total_coupon = 0;
                                    @endphp
                                   
                                    
                                   <p> Phí ship : {{number_format($details->product_feeship,0,',','.')}}.000VNĐ </br></p>
                                   <p>Thanh toán :<strong> {{(float)number_format((float)$total_coupon = $total + $details->product_feeship,0,',','.')}}.000VNĐ</strong> </p> 
                                  
                                  </td>
                                </tr>
                               
                              </tbody>
                            </table>
                            <a target="_blank" href="{{url('/indonhang/'.$details->order_id)}}">In đơn hàng</a> 
                          </div>
                         
                        </div> 
                      </div>
      
                    
                </div>
            </div>
        </div>
    </section>
    
   
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>MẸ</span>-BÉ</h2>
                            <p>Chuyên cung cấp đồ dùng chính hãng cho mẹ và trẻ nhỏ</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="http://127.0.0.1:8000/image/mebeg.jpg" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                         <img src="http://127.0.0.1:8000/image/mevabe.png" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                         <img src="http://127.0.0.1:8000/image/mebe1.jpg" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                         <img src="http://127.0.0.1:8000/image/mebe2.jpg" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    
                   
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Ý kiến cho shop</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Đóng góp ý kiến của bạn cho chúng tôi...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom"style="text-align: center">
            <div class="container"style="text-align: center">
                <div  style="text-align: center">
                    <p class="pull-left"style="text-align: center">Copyright © mevabe. All rights reserved.</p>
                   
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('frontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('frontend/js/lightslider.js')}}"></script>
    <script src="{{asset('frontend/js/prettify.js')}}"></script>


    <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
   {{--  <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
    <script>paypal.Buttons().render('body');</script> --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="X1XOHBox"></script>
<script type="text/javascript">
function view(){
    if(localStorage.getItem('data')!=null){
        var data= JSON.parse(localStorage.getItem('data'));
        data.reverse();
        document.getElementById('row_wishlist').style.overflow='scroll';
        document.getElementById('row_wishlist').style.height='400px';

        for(i=0; i<data.length;i++){
            var ten= data[i].ten;
            var gia= data[i].gia;
            var hinh= data[i].hinhsanpham;
            var url= data[i].url;
            $("#row_wishlist").append('<div class="row" style="margin:10px 0;"><div class="col-md-4"><img src="'+hinh+'" width="100%"></div><div class="col-md-8 info_wishlist"><p>'+ten+'</p><p style="color:#FE980F">'+gia+'</p><a href="'+url+'">Đặt hàng</a></div></div>');


        }
    }
}
view();
function add_wishlist(click_id)
{
    var id=click_id;

    var ten= document.getElementById('wishlist_tensanpham'+id).value;
    var gia= document.getElementById('wishlist_giasanpham'+id).value;
    var hinhsanpham= document.getElementById('wishlist_hinhsanpham'+id).src;
    var url= document.getElementById('wishlist_url'+id).href;
   
    var newItem={
        'url':url,
        'id':id,
        'ten':ten,
        'gia':gia,
        'hinhsanpham':hinhsanpham
    }
     if(localStorage.getItem('data')==null){
        localStorage.setItem('data','[]');
    }
    var old_data=JSON.parse(localStorage.getItem('data'));
   
    var matches= $.grep(old_data,function(obj){
        return obj.id==id;
    })
    if(matches.length){
        alert('Sản phẩm bạn đã yêu thích nên không thể thêm');

    }else{
        old_data.push(newItem);
        $("#row_wishlist").append('<div class="row" style="margin:10px 0;"><div class="col-md-4"><img src="'+newItem.hinhsanpham+'" width="100%"></div><div class="col-md-8 info_wishlist"><p>'+newItem.ten+'</p><p style="color:#FE980F">'+newItem.gia+'</p><a href="'+newItem.url+'">Đặt hàng</a></div></div>');
    }
    localStorage.setItem('data',JSON.stringify(old_data));
}
</script>

    <script type="text/javascript">
    
show_cart();
              function show_cart(){
                  $.ajax({
                          url: '{{url('/showgiohangmenu')}}',
                          method:"GET",
                         
                          success:function(data){
  
                           $('#show-cart').html(data);
  
                          }
  
                      });
              }
        $(document).ready(function(){
            $('.add-to-cart').click(function(){

                let id = $(this).data('id_product');
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
  
</body>
</html>