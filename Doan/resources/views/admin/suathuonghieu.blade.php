@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thương hiệu
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
                                @foreach($suathuonghieu as $key => $pro)
                                <form role="form" action="{{URL::to('/capnhatthuonghieu/'.$pro->idthuonghieu)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="tenthuonghieu" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->tenthuonghieu}}">
                                </div>
                       
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục thương hiệu</label>
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
                                 
                               
                               
                                <button type="submit" name="themthuonghieu" class="btn btn-info">Cập nhật thương hiệu</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection