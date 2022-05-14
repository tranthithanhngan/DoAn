<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFek1dGmJRAkycuHAHRg320mUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      
</head>
<body>
<div class="container" style="background: #222;border-radius:12px;padding:15px;">

<div class="col-md-12">
<p style="text-align: center; color:#fff">Đây là email tự động. Qúy khách vui lòng không trả lời email này.</p>
<div class="row" style="background: cadetblue;padding:15px;">
<div class="col-md-6" style="text-align: center; color:#fff;font-weight:bold;font-size:30px;">
<h4 style="margin: 0">CÔNG TY TNHH MẸ VÀ BÉ</h4>
</div>
<div class="col-md-6 logo" style="color: #fff">
<p>Chào bạn <strong style="color: #000;text-decoration:underline;">.....</strong></p>
</div>
<div class="col-md-12">
    <p style="color: #fff;font-size:17px;">Bạn đã đăng kí dịch vụ tại shop với thông tin như sau:</p>
    <h4 style="text-transform:uppercase;color:#000">Thông tin đơn hàng  </h4>
    <p >Mã đơn hàng: <strong style="text-transform:uppercase;color:#fff">....</strong></p>
    {{-- <p >Mã khuyến mãi áp dụng: <strong style="text-transform:uppercase;color:#fff">....</strong></p> --}}
    <p >Dịch vụ: <strong style="text-transform:uppercase;color:#fff">Đặt hàng trực tuyến</strong></p>
    <h4 style="text-transform:uppercase;color:#000">Thông tin người nhận  </h4>
    <p>Email:
        @if()
        Không có
        @else
        <span style="color: #fff">...</span>
        @endif
    </p>
    <p>Họ và tên người gửi:
        @if()
        Không có
        @else
        <span style="color: #fff">...</span>
        @endif
    </p>
    <p>Địa chỉ nhận hàng:
        @if()
        Không có
        @else
        <span style="color: #fff">...</span>
        @endif
    </p>
    <p>Số điện thoại:
        @if()
        Không có
        @else
        <span style="color: #fff">...</span>
        @endif
    </p>
    <p>Ghi chú đơn hàng:
        @if()
        Không có
        @else
        <span style="color: #fff">...</span>
        @endif
    </p>
    <p>Hình thức thanh toán: <strong style="text-transform:uppercase;color:#fff">
        @if()
        Chuyển khoản ATM
        @else
        TIỀN MẶT
        <span style="color: #fff">...</span>
        @endif
    </strong> </p>
    <p style="color: #fff">Nếu thông tin người nhận hàng không có chúng tôi sẽ liên hệ với người đặt hàng để trao đổi thông tin về đơn hàng đã đặt.</p>
    <h4 style="color: #000;text-transform:uppercase">Sản phẩm đã đặt</h4>
    <table class="table table-striped" style="border: 1px">
    <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Gía tiền</th>
            <th>Số lượng đặt</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @php
        $sub_total=0;
        $total=0;
        @endphp
        @foreach()
        @php
        $sub_total=...;
        $total=...;
        @endphp
    <tr>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        </tr> 
        @endforeach
        <tr>
            <td colspan="4" align="right">Tổng tiền thanh toán:</td>
        </tr>   
    </tbody>
    </table>
</div>
<p style="color: #fff;text-align:center;font-size:15px">Xem lại lịch sử đơn hàng tại: <a target="_blank" href="{{url('/lichsu')}}">Lịch sử đơn hàng của bạn</a> </p>
<p style="color: #fff">Mọi chi tiết xin liên hệ website tại: <a target="_blank" href="http://tranthanhngan.com">Shop</a>, hoặc liên hệ qua số hotline:0372014217.Xin cảm ơn quý khách đã đặt hàng shop chúng tôi.</p>
</div>
</div>

</div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com.bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA712mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
