@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật bài viết
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
                                @foreach($suabaiviet as $key => $pro)
                                <form role="form" action="{{URL::to('/capnhatbaiviet/'.$pro->baiviet_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" name="baiviet_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->baiviet_name}}">
                                </div>
                       
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="baiviet_status" class="form-control input-sm m-bot15">
                                           <option value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                            
                                    </select>
                                </div>
                                 
                               
                               
                                <button type="submit" name="thembaiviet" class="btn btn-info">Cập nhật bài viết</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection