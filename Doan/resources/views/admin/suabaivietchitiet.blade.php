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
                                <form role="form" action="{{URL::to('/capnhatbaivietchitiet/'.$pro->baivietcon_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" name="baivietcon_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->baivietcon_name}}">
                                </div>

                              
                                


                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả nội dung bài viết chi tiết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="baivietcon_sum" id="exampleInputPassword1">{{$pro->baivietcon_sum}}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết chi tiết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="baivietcon_content" id="exampleInputPassword1" >{{$pro->baivietcon_content}}</textarea>

                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                    <input type="file" name="hinhbaivietcon" class="form-control" id="exampleInputEmail1">
                                </div>
                               
                                 
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Bài viết </label>
                                      <select name="baiviet_id" class="form-control input-sm m-bot15">
                                     

                                        @foreach($baiviet as $key => $cate)
                                        @if($cate->baiviet_id==$pro->baiviet_id)
                                        <option selected value="{{$cate->baiviet_id}}">{{$cate->baiviet_name}}</option>
                                        @else
                                        <option value="{{$cate->baiviet_id}}">{{$cate->baiviet_name}}</option>
                                        @endif
                                    @endforeach
                                  
                                            
                                    </select>
                                </div>
                              
                                 
                               
                               
                                <button type="submit" name="thembaivietchitiet" class="btn btn-info">Cập nhật bài viết</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection