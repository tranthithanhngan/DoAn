@extends('admin.danhmuc')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê đơn hàng
      </div>
      {{-- <div class="row w3-res-tb">
       
       
      
      </div> --}}
      <div class="table-responsive">
                        <?php
                              $message = Session::get('message');
                              if($message){
                                  echo '<span class="text-alert">'.$message.'</span>';
                                  Session::put('message',null);
                              }
                              ?>
        <table class="table table-striped b-t b-light"id="myTable">
          <thead>
            <tr>
             
              <th>Thứ tự</th>
              <th>Mã đơn hàng</th>
              <th>Tên người đặt</th>
              <th>Tên người nhận</th>
              <th>Ngày tháng đặt hàng</th>
              <th>Tình trạng đơn hàng</th>
              <th>Lí do hủy đơn hàng</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @php 
            $i = 0;
            @endphp
            @foreach($tatca_donhang as $key => $dh)
              @php 
              $i++;
              @endphp
            <tr>
              <td><i>{{$i}}</i></label></td>
              <td>{{ $dh->order_id}}</td>
              <td>{{ $dh->customer_name }}</td>
              <td>{{ $dh->shipping_name }}</td>
              
              <td>{{ $dh->ngaydat }}</td>
              <td>@if($dh->order_status==1)
                <span class="text text-success">Đơn hàng mới </span>
                  @elseif($dh->order_status==2)
                  <span class="text text-warning"> Đã xử lý - Đã giao hàng </span>
                      @else 
                     <span class="text text-danger"> Đã hủy đơn hàng</span>
                  @endif
              </td>
             <td>
               @if($dh->order_status==3)
              {{ $dh->lidohuy }}
              @endif
             </td>
             
              <td>
                <a href="{{URL::to('/xemdonhang/'.($dh->order_id))}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-eye text-success text-active"></i></a>
  
                <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/xoadonhang/'.($dh->order_id))}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i>
                </a>
  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{-- <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
               {!!$tatca_donhang->links()!!}
            </ul>
          </div>
        </div>
      </footer> --}}
      
    </div>
  </div>
@endsection