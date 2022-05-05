@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thư viện ảnh
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <form action="{{URL::to('/insert_hinhanh/'.$idsp)}}" method="POST" enctype="multipart/form-data">
                           @csrf
                                <div class="row">
                                <div class="col-md-3" align="right">

                                </div>

                                <div class="col-md-6">
                            <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                            <span id="error_hinhanh"> 
                                
                            </span>
                                </div>
                                <div class="col-md-3" >
                                        <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-success ">
                                </div>
                            </div>
                        </form>
                        <div class="panel-body">
                            <input type="hidden" value="{{$idsp}}" name="idsp" class="idsp">
                      <form >
                          @csrf
                            <div id="hinhanh_load">
                              
                          </div>
                        </form>
                        </div>
                    </section>

            </div>
            <script type="text/javascript">
              $(document).ready(function(){
                
                 hinhanh_load();
                 
             function hinhanh_load(){
                var idsp = $('.idsp').val();
                var _token = $('input[name="_token"]').val();
                     
                     $.ajax({
    url: "{{url('/select-hinhanh')}}",
    method: "POST",
    data:{idsp:idsp,_token:_token},
    success:function(data){
        $('#hinhanh_load').html(data);
    }
  });
 
 }
 $('#file').change(function(){
var error='';
var files = $('#file')[0].files;
if(files.length>5){
    error+='<p>Bạn chọn tối đa chỉ được 5 ảnh</p>'

}else if(files.length==" "){
    error+='<p>Bạn không dược bỏ trống</p>'
}else if(files.size >20000000){
    error+='<p>File ảnh không được lơn shown 2M</p>'
}
if(error=='')
{

}
else
{
    $('#file').val('');
    $('#error_hinhanh').html('<span class="text-danger">'+error+'</span>')
    return false;
}
});
$(document).on('blur','.edit_ha_name',function(){

var thuvienanh_id = $(this).data('ha_id');

var _token = $('input[name="_token"]').val();
var thuvienanh_text = $(this).text();
$.ajax({
    url: "{{url('/update-hinhanh')}}",
    method: "POST",
    data:{thuvienanh_id:thuvienanh_id,thuvienanh_text:thuvienanh_text,_token:_token},
    success:function(data){
       hinhanh_load();
       $('#error_hinhanh').html('<span class="text-danger">Cập nhật thành công</span>')
    }
  });
});

$(document).on('click','.delete-hinhanh',function(){

var thuvienanh_id = $(this).data('ha_id');
var _token = $('input[name="_token"]').val();
if(confirm('Bạn muốn xóa hình ảnh này không ?')){


$.ajax({
    url: "{{url('/delete-hinhanh')}}",
    method: "POST",
    data:{thuvienanh_id:thuvienanh_id,_token:_token},
    success:function(data){
       hinhanh_load();
       $('#error_hinhanh').html('<span class="text-danger">Xóa hình ảnh thành công</span>')
    }
  });
}
});


$(document).on('change','.file_image',function(){

var thuvienanh_id = $(this).data('ha_id');
var image = document.getElementById('file-'+thuvienanh_id).files[0]; 
var _token = $('input[name="_token"]').val();

var form_data= new FormData();
 form_data.append("file",document.getElementById('file-'+ thuvienanh_id).files[0]); 

 form_data.append("thuvienanh_id",thuvienanh_id);

$.ajax({
    url: "{{url('/capnhat-hinhanh')}}",
    method: "POST",
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){
       hinhanh_load();
       $('#error_hinhanh').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>')
    }
  });

});
     
 });
 
 </script>
@endsection