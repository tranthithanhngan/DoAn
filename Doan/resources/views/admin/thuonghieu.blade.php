@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thương hiệu
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
                                <form role="form" action="{{URL::to('/luuthuonghieu')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="tenthuonghieu" class="form-control " id="slug" placeholder="Tên thương hiệu" onkeyup="ChangeToSlug();"> 
                                </div>
                                  
                                 <div class="form-group"> 
                                    <label for="exampleInputPassword1">Danh mục   </label>
                                      <select name="iddanhmuc" class="form-control input-sm m-bot15">
                                        @foreach($danhmuc as $key => $cate)
                                            <option value="{{$cate->id}}">{{$cate->tendanhmuc}}</option>
                                        @endforeach  
                                            
                                    </select>
                                </div>         
                                
                               
                               
                                <button type="submit" name="themthuonghieu" class="btn btn-info">Thêm thương hiệu</button>
                                </form>
                            </div>              
 
                        </div>
                    </section>

            </div>
@endsection