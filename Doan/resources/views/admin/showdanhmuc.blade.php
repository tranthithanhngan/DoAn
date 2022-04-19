<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" > 
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
 
    <title>Hiển thị danh mục sản phẩm</title>

</head>
<body>
   <header>TOP</header>
<section class="admin-content">
   
       
<div class="admin-content-left" >
  
    <ul >
        <li><a href=""style="color: black!important ">Danh mục</a>
        <ul >
            <li><a href="/"style="color: black!important ">Thêm danh mục</a></li>
            
            <li><a href=""style="color: black!important ">Danh sách danh mục</a></li>
           
        </ul>
        
        </li>
        <li><a href=""style="color: black!important " >Loại sản phẩm</a>
            <ul >
            <li><a href=""style="color: black!important ">Thêm loại sản phẩm</a></li>
            <li><a href=""style="color: black!important ">Danh sách loại sản phẩm</a></li>
        </ul>
    </li>
        <li><a href=""style="color: black!important ">Sản phẩm</a><ul>
            <li><a href=""style="color: black!important ">Thêm sản phẩm</a></li>
            <li><a href=""style="color: black!important ">Danh sách sản phẩm</a></li>
        </ul>
    </li>
     
    </ul>
</div>
<div class="admin-content-right">

    
    <div class="admin-content-right-danhmuc_list" >

        <h1>DANH SÁCH DANH MỤC</h1>        
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr style="text-align: center">
                  {{-- <th>STT</th> --}}
                  <th>ID</th>
                  <th>Danh mục </th>
                  <th>Tùy biến</th>
                 
              </tr>
             
          </thead>
          <tbody>
              
              @foreach($danhmucs as $danhmuc)
              <tr style="text-align: center">
                
                  <td>{{$danhmuc->id}}</td>
                  <td><input id="danhmuc-{{$danhmuc->id}}" type="text" value="{{$danhmuc->tendanhmuc}}" disabled></td>
                  <td><button  style="background-color: darkorange;width:50px; border-radius:5px; margin-right:10px">Sửa</button><button onclick="delete1({{$danhmuc->id}})" style="background-color: rgb(255, 0, 55);width:50px; border-radius:5px;">Xóa</button></td>
                  

                  {{-- <td>
                    {{-- <form action="/documents/{{$documents->id}}/edit" method="get">
                      @csrf
                      @role('expert')
                      <button  class="btn btn-danger" type="submit">Thụ lý</button>
                      @endrole
                      @role('head-of-department')
                      <button  class="btn btn-danger" type="submit">Duyệt</button>
                      @endrole
                    </form> --}}
                  {{-- </td> --}} 
                  
              </tr>
              @endforeach
          </tbody>
         
          </table> 
    </div>

</div>
</section>
 </body>
 



 </html>