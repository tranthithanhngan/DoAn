<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
<meta name ="csrf-token" content="{{csrf_token()}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="{{asset('css/font.css')}}" type="text/css"/>
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 
{{-- <link rel="stylesheet" href="{{asset('css/morris.css')}}" type="text/css"/> --}}
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" type="text/css"/> --}}
<!-- calendar -->
<link rel="stylesheet" href="{{asset('css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('js/raphael-min.js')}}"></script>
<script src="{{asset('js/morris.js')}}"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a target="_blank" href="{{url('/')}}" class="logo">
        Shop 
    </a>
    <div class="sidebar-toggle-box">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            
            <input type="text" class="form-control search "  placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('image/aososinh.jpg')}}">
                <span class="username">
                  
                	<?php
					$name = Session::get('admin_name');
                  
                    // $name= $name->admin_name;
					if($name){
						echo $name;
						
					}
					?>
					

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/trangadmin')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                <li>
                    <a  href="{{URL::to('/tranglienhe')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Liên hệ</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub">
                       
                        <li><a href="{{URL::to('/themslides')}}">Thêm slider</a></li>
                        <li><a href="{{URL::to('/lietkeslides')}}">Liệt kê slider</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themdanhmuc')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/showdanhmuc')}}">Liệt kê danh mục sản phẩm</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương hiệu </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themthuonghieu')}}">Thêm thương hiệu</a></li>
						<li><a href="{{URL::to('/showthuonghieu')}}">Liệt kê thương hiệu</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themsanpham')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/showsanpham')}}">Liệt kê sản phẩm</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/donhang')}}">Quản lý đơn hàng</a></li>
						
                      
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bài viết </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/thembaiviet')}}">Thêm bài viết</a></li>
						<li><a href="{{URL::to('/showbaiviet')}}">Liệt kê bài viết</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bài viết chi tiết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/thembaivietchitiet')}}">Thêm bài viết chi tiết</a></li>
						<li><a href="{{URL::to('/showbaivietchitiet')}}">Liệt kê bài viết chi tiết</a></li>
                      
                    </ul>
                </li>
              
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bình luận</span>
                    </a>
                    <ul class="sub">
					
						<li><a href="{{URL::to('/showbinhluan')}}">Liệt kê bình luận</a></li>
                      
                    </ul>
                </li>
                
              
               
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/themusers')}}">Thêm user</a></li>
                        <li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>
                      
                    </ul>
                </li>
                @hasrole('admin')

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/themusers')}}">Thêm user</a></li>
                        <li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>
                      
                    </ul>
                </li>
                @endhasrole
                
            </ul>            </div>
       
    </div>
</aside>



<section id="main-content">
  
	<section class="wrapper">
       
        @yield('admin_content')
 
    </section>
 <!-- footer -->
		  {{-- <div class="footer">
			
		  </div> --}}
  <!-- / footer -->
</section>
<!--main content end-->
{{-- </section> --}}
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('js/ckeditor.js')}}"></script>
<script src="{{asset('js/jquery.form-validator.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready( function () {
   
    $('#myTable').DataTable();
} );
</script>

<script type="text/javascript"> 
$('.comment_duyet_btn').click(function(){
var binhluan_status= $(this).data('comment-status');
var binhluan_id= $(this).data('comment-id');
var idsanpham= $(this).attr('id');
if(binhluan_status==0)
{
    var alert='Thay đổi thành Bỏ Duyệt thành công';
}
else{
    var alert='Thay đổi thành Duyệt thành công';
}

$.ajax({
                url : '{{url('/duyet-comment')}}',

                method: 'POST',
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },

                data:{binhluan_status:binhluan_status, binhluan_id:binhluan_id ,idsanpham:idsanpham },
                // dataType:"JSON",
                success:function(data){
                    
                    $('#thongbao_binhluan').html('<span class="text text-alert">'+alert+'</span>')
                    location.reload();

                }
        });

});
$('.btn-traloi-comment').click(function(){
    var binhluan_id= $(this).data('binhluan_id');
    var binhluan= $('.reply_comment_'+binhluan_id).val();

var idsanpham= $(this).data('sanpham_id');
var alert='Trả lời bình luận thành công';
    

$.ajax({
                url : '{{url('/traloi-comment')}}',

                method: 'POST',
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },

                data:{binhluan:binhluan, binhluan_id:binhluan_id ,idsanpham:idsanpham },
                // dataType:"JSON",
                success:function(data){
                    $('.reply_comment_'+binhluan_id).val('');
                    $('#thongbao_binhluan').html('<span class="text text-alert">'+alert+'</span>')
                    location.reload();

                }
        });
});
</script>
<script type="text/javascript">
 
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
         

   
   
</script>
<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
       
        $.ajax({
                url : '{{url('/update-qty')}}',

                method: 'POST',

                data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
                // dataType:"JSON",
                success:function(data){

                    alert('Cập nhật số lượng thành công');
                 
                   location.reload();
                    
              
                    

                }
        });

    });
</script>
<script type="text/javascript"> 
$(document).ready(function(){
    chart30day();

var myfirstchart=new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  parseTime:false,
  hideHover:'auto',
  lineColors:['#819C79','#fc8710','#FF6541','#A4AD03','#766B56'],
  data: [
   
    {ngaydat: '2020', value: 5 },
    { ngaydat: '2021', value: 5 },
    { ngaydat: '2022', value: 20 }
  ],
  
  xkey: 'ngaydat',
 
  ykeys: ['doanhso','loinhuan','sldaban','sodonhang'],
  labels: ['Doanh số','Lợi nhuận','SL đã bán','Số đơn hàng']
});



    function chart30day(){
        var _token= $('input[name="_token"]').val();
        $.ajax({
            url:'{{url('/thangngay')}}',
            method: 'POST',
            dataType:"JSON",
            data:{_token:_token},
            success:function(data){
                myfirstchart.setData(data);
            }
        });
    }
$('.dashboard-filter').change(function(){
var dashboard_value=$(this).val();
var _token= $('input[name="_token"]').val();

$.ajax({
url:'{{url('/dashboard-filter')}}',
method: 'POST',
dataType:"JSON",
data:{dashboard_value:dashboard_value,_token:_token},
success:function(data){
    myfirstchart.setData(data);
}
});
});
$('#btn-dashboard-filter').click(function(){
 
var _token= $('input[name="_token"]').val();
var from_date=$('#datepicker').val();
var to_date=$('#datepicker').val();
$.ajax({
url:'{{url('/locketqua')}}',
method: 'POST',
dataType:"JSON",
data:{from_date:from_date,to_date:to_date,_token:_token},
success:function(data){
    myfirstchart.setData(data);
}
});
});
});
</script>
<script  type="text/javascript">
$(function(){
$("#datepicker").datepicker({
prevText:"Tháng trước",
nextText:"Tháng sau",
dateFormat:"yy-mm-dd",
dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","  Chủ nhật",],
duration:"slow"
});
$("#datepicker2").datepicker({
prevText:"Tháng trước",
nextText:"Tháng sau",
dateFormat:"yy-mm-dd",
dayNamesMin:["Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7","  Chủ nhật",],
duration:"slow"
});
});
</script>
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
       
        j= 0;
        for(i=0;i < order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
       
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
          
            if(parseInt(order_qty) > parseInt(order_qty_storage)){
               j = j + 1;
                if(j==1){
                    alert('Số lượng bán trong kho không đủ');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#000');
            }
        }
        if(j==0){
          
                $.ajax({
                        url : '{{url('/update-order-qty')}}',
                            method: 'POST',
                            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                            success:function(data){
                                alert('Thay đổi tình trạng đơn hàng thành công');
                                location.reload();
                            }
                });
            
        }

    });
</script>
{{-- <script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
             var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });
        $('.add_delivery').click(function(){

           var city = $('.city').val();
           var province = $('.province').val();
           var wards = $('.wards').val();
           var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
           // alert(city);
           // alert(province);
           // alert(wards);
           // alert(fee_ship);
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                   fetch_delivery();
                }
            });


        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        }); 
    }) --}}


{{-- </script> --}}

<script type="text/javascript">
        $.validate({
            
        });
</script>
 <script>
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('id4');
</script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
