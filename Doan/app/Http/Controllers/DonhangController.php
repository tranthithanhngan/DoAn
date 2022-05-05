<?php

namespace App\Http\Controllers;
use DB;
use Session;
use PDF;
use App\Models\donhang;
use App\Models\SP;
use App\Models\ship;
use App\Models\sanpham;
use App\Models\nguoidung;
use App\Models\Giamgia;
use App\Models\donhangchitiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class DonhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function index()
    {
        //
    }
    public function donhang(){

    	
        $tatca_donhang = DB::table('donhangs')
        ->join('nguoidungs','donhangs.customer_id','=','nguoidungs.customer_id')
        ->join('ships','donhangs.shipping_id','=','ships.shipping_id')
        ->select('donhangs.*','nguoidungs.customer_name','ships.shipping_name')
        ->orderby('donhangs.order_id')->get();
       
        $donhang = view('admin.quanlidonhang')->with('tatca_donhang',$tatca_donhang);
    	return view('admin.danhmuc')->with('donhang',$donhang);
    }
    public function xemdonhang($order_id){

        $donhang_chitiet = donhangchitiet::with('sanpham')->where('order_id',$order_id)->get();
		$donhang = donhang::where('order_id',$order_id)->get();
		foreach($donhang as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		// dd($donhang_chitiet);
		$nguoidung = nguoidung::where('customer_id',$customer_id)->first();
		$ship = ship::where('shipping_id',$shipping_id)->first();

		$donhang_chitiet_sanpham = donhangchitiet::with('sanpham')->where('order_id', $order_id)->get();
        // dd($donhang_chitiet);
		// foreach($donhang_chitiet_sanpham as $key => $order_d){
            

		// 	$product_coupon = $order_d->product_coupon;
        // }
        
		// if($product_coupon != 'no'){
		// 	$coupon = Giamgia::where('coupon_code',$product_coupon)->first();
		// 	$coupon_condition = $coupon->coupon_condition;
		// 	$coupon_number = $coupon->coupon_number;
		// }else{
		// 	$coupon_condition = 2;
		// 	$coupon_number = 0;
		// }
       
		
        return view('admin.xemdonhang')->with(compact('donhang_chitiet','nguoidung','ship','donhang_chitiet_sanpham','donhang','order_status'));
    	
      
    }

    public function xoadonhang(Request $request ,$order_id){
		$order = donhang::where('order_id',$order_id)->first();
		$order->delete();
		 Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();

	}
	public function update_order_qty(Request $request){
		//update order
		$data = $request->all();
		$order = donhang::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();
		if($order->order_status==2){
			foreach($data['order_product_id'] as $key => $product_id){
				
				$product = sanpham::find($product_id);
				$product_quantity = $product->slsanpham;
				$product_sold = $product->sldaban;
				foreach($data['quantity'] as $key2 => $qty){
						if($key==$key2){
								$pro_remain = $product_quantity - $qty;
								$product->slsanpham = $pro_remain;
								$product->sldaban = $product_sold + $qty;
								$product->save();
						}
				}
			}
		}elseif($order->order_status!=2 && $order->order_status!=3){
			foreach($data['order_product_id'] as $key => $product_id){
				
				$product = sanpham::find($product_id);
				$product_quantity = $product->slsanpham;
				$product_sold = $product->sldaban;
				foreach($data['quantity'] as $key2 => $qty){
						if($key==$key2){
								$pro_remain = $product_quantity + $qty;
								$product->slsanpham = $pro_remain;
								$product->sldaban = $product_sold - $qty;
								$product->save();
						}
				}
			}
		}


	}
	public function update_qty(Request $request){
		$data = $request->all();
		$order_details = donhangchitiet::where('idsanpham',$data['order_product_id'])->first();
		$order_details->product_sales_quantity = $data['order_qty'];
		$order_details->save();
	}
    public function indonhang($order_id){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($order_id));
		
		return $pdf->stream();
	}
	public function print_order_convert($order_id){
		$donhang_chitiet = donhangchitiet::where('order_id',$order_id)->get();
		$donhang = donhang::where('order_id',$order_id)->get();
		foreach($donhang as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
		}
		$nguoidung = nguoidung::where('customer_id',$customer_id)->first();
		$ship = ship::where('shipping_id',$shipping_id)->first();

		$donhang_chitiet_sanpham = donhangchitiet::with('sanpham')->where('order_id', $order_id)->get();

		// foreach($order_details_product as $key => $order_d){

		// 	$product_coupon = $order_d->product_coupon;
		// }
		// if($product_coupon != 'no'){
		// 	$coupon = Coupon::where('coupon_code',$product_coupon)->first();

		// 	$coupon_condition = $coupon->coupon_condition;
		// 	$coupon_number = $coupon->coupon_number;

		// 	if($coupon_condition==1){
		// 		$coupon_echo = $coupon_number.'%';
		// 	}elseif($coupon_condition==2){
		// 		$coupon_echo = number_format($coupon_number,0,',','.').'đ';
		// 	}
		// }else{
		// 	$coupon_condition = 2;
		// 	$coupon_number = 0;

		// 	$coupon_echo = '0';
		
		// }

		$output = '';

		$output.='<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<h1><centerCông ty TNHH một thành viên ABCD</center></h1>
		<h4><center>Độc lập - Tự do - Hạnh phúc</center></h4>
		<p>Người đặt hàng</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên khách đặt</th>
						<th>Số điện thoại</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>';
				
		$output.='		
					<tr>
						<td>'.$nguoidung->customer_name.'</td>
						<td>'.$nguoidung->customer_phone.'</td>
						<td>'.$nguoidung->customer_email.'</td>
						
					</tr>';
				

		$output.='				
				</tbody>
			
		</table>

		<p>Ship hàng tới</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên người nhận</th>
						<th>Địa chỉ</th>
						<th>Sdt</th>
						<th>Email</th>
						<th>Ghi chú</th>
					</tr>
				</thead>
				<tbody>';
				
		$output.='		
					<tr>
						<td>'.$ship->shipping_name.'</td>
						<td>'.$ship->shipping_address.'</td>
						<td>'.$ship->shipping_phone.'</td>
						<td>'.$ship->shipping_email.'</td>
						<td>'.$ship->shipping_notes.'</td>
						
					</tr>';
				

		$output.='				
				</tbody>
			
		</table>

		<p>Đơn hàng đặt</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên sản phẩm</th>
						<th>Mã giảm giá</th>
						<th>Phí ship</th>
						<th>Số lượng</th>
						<th>Giá sản phẩm</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>';
			
				$total = 0;

				foreach($donhang_chitiet_sanpham as $key => $product){

					$subtotal = $product->giasanpham*$product->product_sales_quantity;
					$total+=$subtotal;

					if($product->product_coupon!='no'){
						$product_coupon = $product->product_coupon;
					}else{
						$product_coupon = 'không mã';
					}		

		$output.='		
					<tr>
						<td>'.$product->tensanpham.'</td>
						<td>'.$product_coupon.'</td>
						<td>'.number_format($product->product_feeship,0,',','.').'đ'.'</td>
						<td>'.$product->product_sales_quantity.'</td>
						<td>'.number_format($product->giasanpham,0,',','.').'đ'.'</td>
						<td>'.number_format($subtotal,0,',','.').'đ'.'</td>
						
					</tr>';
				}

				// if($coupon_condition==1){
				// 	$total_after_coupon = ($total*$coupon_number)/100;
	            //     $total_coupon = $total - $total_after_coupon;
				// }else{
                //   	$total_coupon = $total - $coupon_number;
				// }

		$output.= '<tr>
				<td colspan="2">
					
					<p>Phí ship: '.number_format($product->product_feeship,0,',','.').'đ'.'</p>
					<p>Thanh toán : '.number_format($total,0,',','.').'đ'.'</p>
				</td>
		</tr>';
		$output.='				
				</tbody>
			
		</table>

		<p>Ký tên</p>
			<table>
				<thead>
					<tr>
						<th width="200px">Người lập phiếu</th>
						<th width="800px">Người nhận</th>
						
					</tr>
				</thead>
				<tbody>';
						
		$output.='				
				</tbody>
			
		</table>

		';


		return $output;

	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function show(donhang $donhang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function edit(donhang $donhang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, donhang $donhang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function destroy(donhang $donhang)
    {
        //
    }
}
