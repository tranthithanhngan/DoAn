@extends('admin.danhmuc')
@section('admin_content')
<div class="table-agile-info">
  
    <div class="panel panel-default">
      <div class="panel-heading">
       Thông tin người mua
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
             
              <th>Tên khách hàng</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
          
            <tr>
              <td>{{$nguoidung->customer_name}}</td>
              <td>{{$nguoidung->customer_phone}}</td>
              <td>{{$nguoidung->customer_email}}</td>
            </tr>
       
          </tbody>
        </table>
  
      </div>
     
    </div>
  </div>
  <br>
  <div class="table-agile-info">
    
    <div class="panel panel-default">
      <div class="panel-heading">
       Thông tin người nhận hàng
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
             
              <th>Tên người nhận hàng</th>
              <th>Địa chỉ</th>
              <th>Số điện thoại</th>
              <th>Email</th>
              <th>Ghi chú</th>
              <th>Hình thức thanh toán</th>
            
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
          
            <tr>
             
              <td>{{$ship->shipping_name}}</td>
              <td>{{$ship->shipping_address}}</td>
               <td>{{$ship->shipping_phone}}</td>
               <td>{{$ship->shipping_email}}</td>
               <td>{{$ship->shipping_notes}}</td>
               <td>@if($ship->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
              
            
            </tr>
       
          </tbody>
        </table>
  
      </div>
     
    </div>
  </div>
  <br><br>
  
  <div class="table-agile-info">
    
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê chi tiết đơn hàng
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
              <th>Tên sản phẩm</th>
              <th>Số lượng kho còn</th>
              <th>Mã giảm giá</th>
              <th>Phí ship hàng</th>
              <th>Số lượng</th>
              <th>Giá sản phẩm</th>
              <th>Tổng tiền</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @php 
            $i = 0;
            $total = 0;
            @endphp
          @foreach($donhang_chitiet as $key => $details)
  
            @php 
            $i++;
            $subtotal = (int)$details->giasanpham*(int)$details->product_sales_quantity;
            $total= $total+ $subtotal;
             
            @endphp
            <tr class="color_qty_{{$details->idsanpham}}">
             
              <td><i>{{$i}}</i></td>
              <td>{{$details->tensanpham}}</td>
              <td>{{$details->sanpham->slsanpham}}</td>
              <td>@if($details->product_coupon!='no')
                    {{$details->product_coupon}}
                  @else 
                    Không mã
                  @endif
              </td>
              <td>{{(int)number_format((int)$details->product_feeship ,0,',','.')}}.000VNĐ</td>
              <td>
  
                <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->idsanpham}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">
  
                <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->idsanpham}}" value="{{$details->sanpham->slsanpham}}">
  
                <input type="hidden" name="order_code" class="order_code" value="{{$details->order_id}}">
  
                <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->idsanpham}}">
  
               @if($order_status!=2) 
  
                <button class="btn btn-default update_quantity_order" data-product_id="{{$details->idsanpham}}" name="update_quantity_order">Cập nhật</button>
  
              @endif
  
              </td>
              <td>{{(int)number_format((int)$details->giasanpham ,0,',','.')}}.000VNĐ</td>
              <td>{{(int)number_format((int)$subtotal ,0,',','.')}}.000VNĐ</td>
            </tr>
            @endforeach
            <tr>
              <td colspan="2">  
              @php 
                  $total_coupon = 0;
                @endphp
                {{-- @if($coupon_condition==1)
                    @php
                    $total_after_coupon = ($total*$coupon_number)/100;
                    echo 'Tổng giảm :'.number_format($total_after_coupon,0,',','.').'</br>';
                    $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
                    @endphp
                @else 
                    @php
                    echo 'Tổng giảm :'.number_format($coupon_number,0,',','.').'k'.'</br>';
                    $total_coupon = $total + $details->product_feeship - $coupon_number ;
  
                    @endphp
                @endif --}}
                
               <p> Phí ship : {{(int)number_format((int)$details->product_feeship ,0,',','.')}}.000VNĐ </br></p>
               <p>Thanh toán :<strong> {{(int)number_format($total_coupon = $total + $details->product_feeship,0,',','.')}}.000VNĐ</strong> </p> 
              
              </td>
            </tr>
            <tr>
              <td colspan="6">
                @foreach($donhang as $key => $or)
                  @if($or->order_status==1)
                  <form>
                     @csrf
                    <select class="form-control order_details">
                      <option value="">----Chọn hình thức đơn hàng-----</option>
                      <option id="{{$or->order_id}}" selected value="1">Chưa xử lý</option>
                      <option id="{{$or->order_id}}" value="2">Đã xử lý-Đã giao hàng</option>
                     
                    </select>
                  </form>
                  @else
                  <form>
                    @csrf
                    <select class="form-control order_details">
                      <option value="">----Chọn hình thức đơn hàng-----</option>
                      <option disabled id="{{$or->order_id}}" value="1">Chưa xử lý</option>
                      <option id="{{$or->order_id}}" selected value="2">Đã xử lý-Đã giao hàng</option>
                      
                    </select>
                  </form>
  
                  
  
                  @endif
                  @endforeach
  
  
              </td>
            </tr>
          </tbody>
        </table>
        <a target="_blank" href="{{url('/indonhang/'.$details->order_id)}}">In đơn hàng</a> 
      </div>
     
    </div> 
  </div>
@endsection