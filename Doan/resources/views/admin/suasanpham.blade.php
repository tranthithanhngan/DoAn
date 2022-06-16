@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật sản phẩm
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
                                @foreach($suasanpham as $key => $pro)
                                <form role="form" action="{{URL::to('/capnhatsanpham/'.$pro->idsanpham)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="tensanpham" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->tensanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SL sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="slsanpham" class="form-control" id="convert_slug" value="{{$pro->slsanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Độ tuổi</label>
                                    <input type="text" data-validation="number"   name="dotuoi" class="form-control " id="slug" placeholder="Tên danh mục"value="{{$pro->dotuoi}}" > 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">size</label>
                                    <input type="text"   name="size" class="form-control " id="slug" placeholder="Tên danh mục" value="{{$pro->size}}"> 
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" value="{{$pro->giasanpham}}" name="giasanpham" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá gốc sản phẩm</label>
                                    <input type="text" value="{{$pro->giagoc}}" name="giagoc" class="form-control" id="exampleInputEmail1" >
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="hinhsanpham" class="form-control" id="exampleInputEmail1">
                                    {{-- <img src="{{URL::to('image/'.$pro->hinhsanpham)}}" height="100" width="100"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="motasanpham" id="exampleInputPassword1">{{$pro->motasanpham}}</textarea>
                                </div>
                                 
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="iddanhmuc" class="form-control input-sm m-bot15">
                                        @foreach($danhmuc as $key => $cate)
                                            @if($cate->id==$pro->iddanhmuc)
                                            <option selected value="{{$cate->id}}">{{$cate->tendanhmuc}}</option>
                                            @else
                                            <option value="{{$cate->id}}">{{$cate->tendanhmuc}}</option>
                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu   </label>
                                      <select name="idthuonghieu" class="form-control input-sm m-bot15">
                                        @foreach($thuonghieu as $key => $cate)
                                        @if($cate->idthuonghieu==$pro->idthuonghieu)
                                        <option selected value="{{$cate->idthuonghieu}}">{{$cate->tenthuonghieu}}</option>
                                        @else
                                        <option value="{{$cate->idthuonghieu}}">{{$cate->tenthuonghieu}}</option>
                                        @endif
                                          
                                        @endforeach  
                                            
                                    </select>
                                </div> 
                                 
                               
                               
                                <button type="submit" name="themsanpham" class="btn btn-info">Cập nhật sản phẩm</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection