@extends('admin.danhmuc')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bình luận
    </div>
  <div id="thongbao_binhluan">

  </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            
            <th>Duyệt</th>
            <th>Tên người gửi</th>
           
            <th>Bình luận</th>
           
            <th>Sản phẩm</th>
            <th>Quản lý</th>
          
           
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($binhluan as $key => $com)
          <tr>
              <td>
            @if( $com->binhluan_status==1)
            <input type="button" data-comment-status="0" data-comment-id="{{$com->binhluan_id}}" id="{{ $com->idsanpham }}" class="btn btn-primary btn-xs comment_duyet_btn" value=" Duyệt">
            @else
            <input type="button" data-comment-status="1" data-comment-id="{{$com->binhluan_id}}" id="{{ $com->idsanpham }}"class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt">
            @endif</td>
           
            <td>{{ $com->binhluan_name}}
            </td>

            <td>{{ $com->binhluan }}<br>
              <ul class="list_comment">
                Trả lời:
                @foreach($binhluan_traloi as $key => $comm)
                @if($comm->binhluan_traloi==$com->binhluan_id)
                <li style="color: red;margin:3px 40px;list-style-type:decimal ;">
                 {{ $comm->binhluan}}
                </li>
                @endif
              
                @endforeach
               
              </ul>
              @if( $com->binhluan_status==0)
              <textarea  rows="5" class="
             form-control reply_comment_{{$com->binhluan_id }}" style="margin-left: 0;"></textarea><br>
              <button class="btn btn-default btn-xs btn-traloi-comment" data-binhluan_id="{{ $com->binhluan_id }}" data-sanpham_id="{{ $com->idsanpham }}" style="background: greenyellow; color:brown;">Trả lời Binh luận</button>
             
           
              @endif
                
           
         
            </td>
            <td><a href="{{URL::to('/chi-tiet/'.$com->sanpham->idsanpham)}}" target="blank">{{ $com->sanpham->tensanpham }}</a></td>
           
           
            <td>
              <a href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa bình luận này ko?')" href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>
@endsection