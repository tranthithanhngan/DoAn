@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật kho hàng
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
                                @foreach($suakhohang as $key => $pro)
                                <form role="form" action="{{URL::to('/capnhatkhohang/'.$pro->idsanpham)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="tensanpham" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->tensanpham}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SL sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="slsanpham" class="form-control" id="convert_slug" value="{{$pro->slsanpham}}">
                                </div>
                               
                               
                                <button type="submit" name="themsanpham" class="btn btn-info">Cập nhật kho hàng</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection