@extends('admin.danhmuc')
@section('admin_content')
<div class="container-fluid">
   <style type="text/css">
p.title_thongke{
    text-align: center;
    font-size: 20px;
    font-weight: bold;
}
   </style>
   <div class="row">
       <div class="title_thongke">
          <h2 style="text-align: center;color:red"> Thống kê doanh thu</h2>
         <form autocomplete="off" style="margin-top: 20px">
             @csrf
             <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker"class="form-control"></p>
                <input style="margin-top: 10px" type="button" name="" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
            </div>
            <div class="col-md-2">
                <p>Đến ngày: <input type="text" id="datepicker2"class="form-control"></p>
               
            </div>
            <div class="col-md-2">
                <p>Lọc theo
                <select class="dashboard-filter form-control" name="" id="">
                    <option value="">Chọn</option>
                    <option value="7ngay">7 Ngày qua</option>
                    <option value="thangtruoc">Tháng trước</option>
                    <option value="thangnay">Tháng này</option>
                    <option value="365ngayqua">365 Ngày qua</option>
                </select></p>
            </div>
            
        </form>
        <div class="col-md-12">
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>

       </div>

   </div>
   <div class="row">
       <style type="text/css">
    table.table.table-bordered.table-dark{
       background: #32383e;
    }
    table.table.table-bordered.table-dark tr th{
        color:#ffff;
    }
    </style>
    
<p class="title_thongke">Thống kê truy cập</p>
<table>
    <thead>
        <tr>
            <th scope="col">Đang online</th>
            <th scope="col">Tổng tháng trước</th>
            <th scope="col">Ttổng tháng này</th>
            <th scope="col">Tổng một năm</th>
            <th scope="col">Tổng truy cập</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
  
   </div>
  
</div>
@endsection