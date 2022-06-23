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
    
    {{--   <meta property="og:image" content="{{$image_og}}" />  
      <meta property="og:site_name" content="http://localhost/tutorial_youtube/shopbanhanglaravel" />
      <meta property="og:description" content="{{$meta_desc}}" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:url" content="{{$url_canonical}}" />
      <meta property="og:type" content="website" /> --}}
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
                                <li><a href="/" >Trang chủ</a></li>
                                <li class="dropdown"><a class ="{{Request::segment(1) == 'chi-tiet' ? 'active' : ''}}" href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($danhmuc as $key => $dm)
                                        <li><a class ="{{Request::segment(2) == $dm->id ? 'active' : ''}}" href="{{URL::to('/danh-muc/'.$dm->id)}}">{{$dm->tendanhmuc}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($baivietpost as $key => $cate)
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
                                <ul class="nav nav-pills nav-stacked">
                                    {{-- @foreach($thuonghieu as $key => $th)
                                    <li><a href="{{URL::to('/thuong-hieu/'.$th->idthuonghieu)}}"> <span class="pull-right"></span>{{$th->tenthuonghieu}}</a></li>
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
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
                    @foreach($chitietsp as $key => $value)
                    <div class="product-details"><!--product-details-->
                        <style type="text/css">
                        li.active{
                            border: 2px solid #FE980F;
                        }
                        </style>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                              <li class="breadcrumb-item"><a href="{{URL::to('/danh-muc/'. $iddanhmuc_cate)}}">{{$sp_cate}}</a></li>
                              <li class="breadcrumb-item"><a href="{{URL::to('/thuong-hieu/'. $idthuonghieu_cate)}}">{{$th_cate}}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{$tensp_cate}}</li>
                            </ol>
                          </nav>
						<div class="col-sm-5">
							<ul id="imageGallery">
                                @foreach($hinhanhpost as $key => $ha)
                                <li data-thumb="{{asset('image/'.$ha->hinhanh)}}" data-src="{{asset('image/'.$ha->hinhanh)}}">
                                  <img width="100%" alt="{{$ha->thuvienanh_name}}" src="{{asset('image/'.$ha->hinhanh)}}" />
                                </li>
                               @endforeach
                              </ul>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->tensanpham}}</h2>
								<p>Mã ID: {{$value->idsanpham}}</p>
								<img src="images/product-details/rating.png" alt="" />
								
								<form action="{{URL::to('/giohang')}}" method="POST">
									@csrf
									<input type="hidden" value="{{$value->idsanpham}}" class="cart_product_id_{{$value->idsanpham}}">

                                            <input type="hidden" value="{{$value->tensanpham}}" class="cart_product_name_{{$value->idsanpham}}">
                                            <input type="hidden" value="{{$value->slsanpham}}" class="cart_product_quantity_{{$value->idsanpham}}">

                                            <input type="hidden" value="{{$value->hinhsanpham}}" class="cart_product_image_{{$value->idsanpham}}">

                                            
                                            <input type="hidden" value="{{number_format($value->giasanpham,0,',','.')}}" class="cart_product_price_{{$value->idsanpham}}">
                                          
								<span>
									<span>{{number_format($value->giasanpham,0,',','.').'VNĐ'}}</span>
								
									<label>Số lượng:</label>
									<input name="sl" type="number" min="1" class="cart_product_qty_{{$value->idsanpham}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->idsanpham}}" />
								</span>
                                {{-- <button type="submit" class="btn btn-fefault cart ">
                                       <i class="fa fa-shopping-card"></i>
                                Thêm giỏ hàng
                                    </button> --}}
                                    <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->idsanpham}}" name="add-to-cart">
								</form>

								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mơi 100%</p>
								<p><b>Số lượng kho còn:</b> {{$value->slsanpham}}</p>
								<p><b>Thương hiệu:</b> {{$value->tenthuonghieu}}</p>
								<p><b>Danh mục:</b> {{$value->tendanhmuc}}</p>
								<a href=""><img src="image/balobimsua1.jpg" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
								{{-- <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li> --}}
							
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!!$value->motasanpham!!}</p>
								
							</div> 
							
							 {{-- <div class="tab-pane fade" id="companyprofile" > --}}
								{{-- <p>{!!$value->product_content!!}</p> --}}
								
						
							{{-- </div>  --}}
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2022</a></li>
									</ul>
                                    <style type="text/css">
                                        row.style_comment{
                                            border: 1px solid #dd;
                                            border-radius:10px;
                                            background:#f0f0e9;
                                            color:#fff;
                                        }
                                    </style>
                                    <form >
                                        @csrf
                        <input type="hidden" name="idsanpham" class="idsanpham" value="{{$value->idsanpham}}">

                                        <div id="comment_show"> </div>

								
                                </form>
									<p><b>Viết đánh giá của bạn</b></p>
									
                                    <ul class="list-inline" title="Đánh giá sao">
                                        @for($count= 1;$count <=5;$count++)
                                        @php
                                        if($count <=$sao){
                                            $color='color:#ffcc00;';
                                        }
                                        else{
                                            $color='color:#ccc;';
                                        }
                                        @endphp
                                        <li title="star_sao" 
                                        id="{{$value->idsanpham}}-{{$count}}"
                                        data-index="{{$count}}"
                                        data-idsanpham="{{$value->idsanpham}}"
                                        data-sao="{{$sao}}"
                                        class="sao"
                                        style="cursor: pointer;{{$color}} font-size:30px">
                                        &#9733;
                                        </li>
                                        @endfor
                                    </ul>

									<form action="#">
										<span>
											<input style="width:100%;margin-left:0;" type="text" class="comment_name" placeholder="Tên bình luận"/>
										
										</span>
										<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
                                        <div id="thongbao"> </div>
										{{-- <b>Đánh giá sao: </b> <img src="" alt="" /> --}}
										<button type="button" class="btn btn-default pull-right send-comment">
											Bình luận
										</button>
                                       
									</form>
                                </div>
								
							</div>
							
						</div>
					</div><!--/category-tab-->
	@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							@foreach($relate_sp as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center product-related">
                                                    <a href="{{URL::to('/chi-tiet/'.$lienquan->idsanpham)}}">
		                                            <img src="{{URL::to('image/'.$lienquan->hinhsanpham)}}" alt="" />
		                                            <h2>{{number_format($lienquan->giasanpham,0,',','.').' '.'VNĐ'}}</h2>
		                                            <p>{{$lienquan->tensanpham}}</p>
                                                    <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$lienquan->idsanpham}}" name="add-to-cart">
                                                    </a>
		                                        </div>
		                                      
                                			</div>
										</div>
									</div>
							@endforeach		

								
								</div>
									
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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2339123679735877&autoLogAppEvents=1"></script>

<script  type="text/javascript">
    $(document).ready(function(){
        $('#sort').on('change',function(){
    var url=$(this).val();
    
    if(url){
        window.location=url;
    }
    return false;
        });
    });
    </script>
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
$(document).ready(function(){
// alert(idsp);
load_comment();
    function load_comment(){
        var idsp=$('.idsanpham').val();
        var _token=$('input[name="_token"]').val();


        $.ajax({
                            url: '{{url('/load-commnet')}}',
                            method: 'POST',
                            data:{idsp:idsp, _token:_token},
                            success:function(data){
                               $('#comment_show').html(data);
                            }
                        });
    }
    $('.send-comment').click(function(){
        var idsp=$('.idsanpham').val();
        var comment_name=$('.comment_name').val();
        var comment_content=$('.comment_content').val();
        var _token=$('input[name="_token"]').val();
        $.ajax({
                            url: '{{url('/send-comment')}}',
                            method: 'POST',
                            data:{idsp:idsp, _token:_token,comment_name:comment_name,comment_content:comment_content},
                            success:function(){
                                
                                $('#thongbao').html('<span class= "text text-success"> Thêm bình luận thành công,bình luận đang chờ duyệt</span>');
                                load_comment();
                                $('#thongbao').fadeOut(2000);
                                $('.comment_name').val('');
                                $('.comment_content').val('');
                            }
                        });
    });
});

</script>
<script type="text/javascript">
function remove_background(idsanpham)
{
    for(var count =1; count<=5; count++)
    {
        $('#'+idsanpham+'-'+count).css('color','#ccc');
    }
}
//hover chuột 
$(document).on('mouseenter','.sao',function(){
var index=$(this).data("index");
var idsanpham=$(this).data('idsanpham');
remove_background(idsanpham);
for(var count =1; count<=index; count++)
    {
        $('#'+idsanpham+'-'+count).css('color','#ffcc00');
    }
});
//nhã chuột không đánh giá
$(document).on('mouseleave','.sao',function(){
var index=$(this).data("index");
var idsanpham=$(this).data('idsanpham');
var sao=$(this).data("sao");
remove_background(idsanpham);
for(var count =1; count<=sao; count++)
    {
        $('#'+idsanpham+'-'+count).css('color','#ffcc00');
    }
});

//click đánh giá
$(document).on('click','.sao',function(){
var index=$(this).data("index");
var idsanpham=$(this).data('idsanpham');
var _token=$('input[name="_token"]').val();

 $.ajax({
                            url: '{{url('/themsao')}}',
                            method: 'POST',
                            data:{index:index, _token:_token,idsanpham:idsanpham},
                            success:function(data){
                              if(data='done')
                              {
                                  alert("Bạn đã đánh giá "+index+" trên 5")
                              }
                              else{
                                  alert("Lỗi đánh giá")
                              }
                            }
                        });
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#imageGallery').lightSlider({

        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });
</script>

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