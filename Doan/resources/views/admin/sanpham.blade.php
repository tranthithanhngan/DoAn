@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luusanpham')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="tensanpham" class="form-control " id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();"> 
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">SL sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="slsanpham" class="form-control" id="exampleInputEmail1" placeholder="Điền số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Độ tuổi</label>
                                    <input type="text" data-validation="number" data-validation-length="Làm ơn điền độ tuổi"  name="dotuoi" class="form-control " id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();"> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">size</label>
                                    <input type="text" data-validation="length"  data-validation-length="min3"  name="size" class="form-control " id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();"> 
                                </div>
                      
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" data-validation="number"  data-validation-error-msg="Làm ơn điền số tiền" name="giasanpham" class="form-control" id="" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá gốc sản phẩm</label>
                                    <input type="text" data-validation="number"  data-validation-error-msg="Làm ơn điền số tiền" name="giasanpham" class="form-control" id="" placeholder="Tên danh mục">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="hinhsanpham" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="motasanpham" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>

                                </div>
                                 
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục </label>
                                      <select name="iddanhmuc" class="form-control input-sm m-bot15">
                                        @foreach($danhmuc as $key => $cate)
                                            <option value="{{$cate->id}}">{{$cate->tendanhmuc}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu   </label>
                                      <select name="idthuonghieu" class="form-control input-sm m-bot15">
                                        @foreach($thuonghieu as $key => $cate)
                                            <option value="{{$cate->idthuonghieu}}">{{$cate->tenthuonghieu}}</option>
                                        @endforeach  
                                            
                                    </select>
                                </div>   
                               
                               
                                <button type="submit" name="themsanpham" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection