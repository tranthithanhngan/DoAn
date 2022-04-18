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
    <section id="slider">
        {{-- ty le khung --}}
        <div class="aspect-ratio-169">
            <img src="image/slides1.webp">
            <img src="image/slides2.webp">
            <img src="image/slides3.webp">
            <img src="image/slides4.webp">
            <img src="image/slides5.png">
            <img src="image/slides6.png">
        </div>
        <div class="nutcheckbox">
            <div class="nut active"></div>
            <div class="nut"></div>
            <div class="nut"></div>
            <div class="nut"></div>
            <div class="nut"></div>
            <div class="nut"></div>
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
{{-- footer --}}
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
<script>
    const header = document.querySelector("header")
window.addEventListener("scroll",function(){
    x = window.pageYOffset
   if(x>0)
   {
    header.classList.add("sticky")  
   } 
   else{
       header.classList.remove.add("sticky")
   }
})

    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer =document.querySelector('.aspect-ratio-169 ')
    const nutItem = document.querySelectorAll(".nut")
    let imgNumber = imgPosition.length
    let index = 0
    imgPosition.forEach(function(image,index){
    image.style.left = index*100 +"%"
    nutItem[index].addEventListener("click", function(){
        slider(index)
    })
})
function imgSlides(){
    index++;
    if(index >= imgNumber)
    {index= 0}
    slider(index)
   
}
function slider(index){
    imgContainer.style.left="-"+ index*100+"%"
    const nutActive = document.querySelector('.active')
    nutActive.classList.remove("active")
    nutItem[index].classList.add("active")
}
setInterval(imgSlides,5000  )
</script>
</html>