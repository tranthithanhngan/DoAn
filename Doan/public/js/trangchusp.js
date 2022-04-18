// xử lí nhấp vào sẽ mở ra như hover
const itemsliderbar = document.querySelectorAll(".sanpham-left-li")
itemsliderbar.forEach(function(menu, index){
menu.addEventListener("click",function(){
    menu.classList.toggle("block")
})
})

//  xử lí hiển thị thông tin
const bigimg = document.querySelector(".chitiet-content-left-big-img img")
const smallimg = document.querySelectorAll(".chitiet-content-left-small-img img")
smallimg.forEach(function(imgitem,x){
    imgitem.addEventListener("click",function(){
        bigimg.src = imgitem.src
    })
})

const baoquan = document.querySelector(".baoquan p")
const chitiet= document.querySelector(".chitietmathang p")
const sudung = document.querySelector(".sudung p")


 if(baoquan){
    baoquan.addEventListener("click", function(){
        document.querySelector(".chitiet-content-right-bottom-content-chitiet").style.display = "none"
        document.querySelector(".chitiet-content-right-bottom-content-baoquan").style.display = "block"
        document.querySelector(".chitiet-content-right-bottom-content-sudung").style.display = "none"
    })
}

  
 if(sudung){
    sudung.addEventListener("click", function(){
        document.querySelector(".chitiet-content-right-bottom-content-chitiet").style.display = "none"
        document.querySelector(".chitiet-content-right-bottom-content-baoquan").style.display = "none"
        document.querySelector(".chitiet-content-right-bottom-content-sudung").style.display = "block"
    })
}
if(chitiet){
    chitiet.addEventListener("click", function(){
   document.querySelector(".chitiet-content-right-bottom-content-chitiet").style.display ="block"
   document.querySelector(".chitiet-content-right-bottom-content-baoquan").style.display ="none"
   document.querySelector(".chitiet-content-right-bottom-content-sudung").style.display ="none"
})
}

const button = document.querySelector(".chitiet-content-right-bottom-top")
if(button){
button.addEventListener("click",function(){
    document.querySelector(".chitiet-content-right-bottom-content-big").classList.toggle("activeB")
})
}

