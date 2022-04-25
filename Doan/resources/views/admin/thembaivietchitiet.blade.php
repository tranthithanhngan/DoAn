@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm bài viết chi tiết
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
                                <form role="form" action="{{URL::to('/them-baivietchitiet')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết chi tiết</label>
                                    <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="baivietcon_name" class="form-control " id="slug" placeholder="Tên bài viết chi tiết" onkeyup="ChangeToSlug();"> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả nội dung bài viết chi tiết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="baivietcon_sum" id="exampleInputPassword1" placeholder="Mô tả nội dung bài viết chi tiết"></textarea>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết chi tiết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="baivietcon_content" id="exampleInputPassword1" placeholder="Nội dung bài viết chi tiết"></textarea>

                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                    <input type="file" name="hinhbaivietcon" class="form-control" id="exampleInputEmail1">
                                </div>
                               
                                 
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Bài viết </label>
                                      <select name="baiviet_id" class="form-control input-sm m-bot15">
                                        @foreach($baiviet as $key => $cate)
                                            <option value="{{$cate->baiviet_id}}">{{$cate->baiviet_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                
                               
                               
                               
                                <button type="submit" name="thembaivietcon" class="btn btn-info">Thêm bài viết chi tiết</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection