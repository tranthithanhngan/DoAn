@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thông tin liên hệ
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
                                @foreach($lienhe as $key=>$lh)
                                    
                               
                                <form role="form" action="{{URL::to('/capnhatlienhe')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                                             <div class="form-group"> 
                                    <label for="exampleInputPassword1">Thông tin liên hệ </label>
                                     <textarea  style="resize: none"data-validation="length" data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="info_contact" id="exampleInputPassword1"  rows="8" class="form-control">{{$lh->info_contact}}</textarea>
                                </div>  
                                <div class="form-group"> 
                                    <label for="exampleInputPassword1">Bản đồ </label>
                                     <textarea  style="resize: none"data-validation="length"  data-validation-length="min3" data-validation-error-msg="Làm ơn điền ít nhất 3 ký tự" name="info_map" id="exampleInputPassword1"  rows="8" class="form-control">{{$lh->info_map}}</textarea>
                                </div>         
                                <div class="form-group"> 
                                    <label for="exampleInputPassword1">Fanpage </label>
                                     <textarea  style="resize: none" name="info_fanpage" id="exampleInputPassword1"  rows="8" class="form-control">{{$lh->info_fanpage}}</textarea>
                                </div>  
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh logo</label>
                                    <input type="file" name="info_image" class="form-control" id="exampleInputEmail1">
                                   <img src="{{URL::to('image/'.$lh->info_image)}}" alt="" height="100" width="100"> 
                                </div>
                                <button type="submit" name="themthuonghieu" class="btn btn-info">Cập nhật thông tin</button>
                                </form>
                                @endforeach
                            </div>              
 
                        </div>
                    </section>

            </div>
@endsection