@extends('admin.danhmuc')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Thư viện ảnh</th>
            <th>Số lượng</th>
            <th>Độ tuổi</th>
            <th>Size</th>
            <th>Giá bán</th>
            <th>Giá gốc</th>
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
           
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($showsanpham as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->tensanpham }}</td>
            <td><a href="{{URL::to('/themanh/'.$pro->idsanpham)}}">Thêm tư viện ảnh</a></td>
           
            <td>{{ $pro->slsanpham }}</td>
            <td>{{ $pro->dotuoi }}</td>
            <td>{{ $pro->size }}</td>
            <td>{{ number_format($pro->giasanpham,0,',','.') }}đ</td>
            <td>{{ number_format($pro->giagoc,0,',','.') }}đ</td>
            <td><img src="image/{{ $pro->hinhsanpham }}" height="100" width="100"></td>
            <td>{{ $pro->tendanhmuc }}</td>
           
            <td>
              <a href="{{URL::to('/suasanpham/'.$pro->idsanpham)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/xoasanpham/'.$pro->idsanpham)}}" class="active styling-edit" ui-toggle-class="">
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