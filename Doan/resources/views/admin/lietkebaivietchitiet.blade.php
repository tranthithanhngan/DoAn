@extends('admin.danhmuc')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết chi tiết
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên bài viết chi tiết</th>
            <th>Hình bài viết</th>
            <th>Bài viết </th>
            <th>Mô tả nội dung bài viết</th>
            <th>Nội dung bài viết</th>
           
            
           
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach( $showbaivietchitiet as $key => $baiviet)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
           
            <td>{{ $baiviet->baivietcon_name }}</td>
            <td><img src="image/{{$baiviet->hinhbaivietcon}}" height="100" width="100"></td>
            <td>{{ $baiviet->baiviet_name }}</td>
            <td>{{ $baiviet->baivietcon_sum }}</td>
            <td>{{ $baiviet->baivietcon_content }}</td>
           
            
            <td>
                <a href="{{URL::to('/suabaivietchitiet/'.$baiviet->baivietcon_id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')" href="{{URL::to('/deletebaivietchitiet/'.$baiviet->baivietcon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
              {!! $showbaivietchitiet->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection