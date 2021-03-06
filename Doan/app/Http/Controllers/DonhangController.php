<?php

namespace App\Http\Controllers;
use DB;
use Session;
use PDF;
use App\Models\donhang;
use App\Models\SP;
use Carbon\Carbon;
use App\Models\ship;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use App\Models\sanpham;
use App\Models\nguoidung;
use App\Models\doanhthu;
use App\Models\thuonghieu;
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
        
        // $admin_id =  Session::get('admin_id');
        $admin_id =  Auth::id();
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
	public function huydonhang(Request $request){
		$data = $request->all();
		$order = donhang::where('order_id',$data['id'])->first();
		$order->lidohuy = $data['lido'];
		$order->order_status = 3;
		$order->save();
	}

    public function donhang(){

    	
        $tatca_donhang = DB::table('donhangs')
        ->join('nguoidungs','donhangs.customer_id','=','nguoidungs.customer_id')
        ->join('ships','donhangs.shipping_id','=','ships.shipping_id')->whereNotNull('donhangs.created_at')
        ->select('donhangs.*','nguoidungs.customer_name','ships.shipping_name')
        ->orderby('donhangs.order_id','desc')->get();
     
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
		$a=Session::get('fee');
		
        return view('admin.xemdonhang')->with(compact('a','donhang_chitiet','nguoidung','ship','donhang_chitiet_sanpham','donhang','order_status'));
    	
      
    }

    public function xoadonhang(Request $request ,$order_id){
		$order = donhang::where('order_id',$order_id)->first();
		$order->delete();
		 Session::put('message','X??a ????n h??ng th??nh c??ng');
        return redirect()->back();

	}
	public function update_order_qty(Request $request){
		//update order
		$data = $request->all();
		$order = donhang::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();
		$ngaydat=$order->ngaydat;
		
		$doanhthu= doanhthu::where('ngaydat',$ngaydat)->get();
		if($doanhthu){
			$doanhthu_tong=$doanhthu->count();
		}else{
			$doanhthu_tong=0;
		}
		if($order->order_status==2){
			$doanhso=0;
			$loinhuan=0;
			$sldaban=0;
			$sodonhang=0;

			foreach($data['order_product_id'] as $key => $product_id){
				
				$product = sanpham::find($product_id);
				$product_quantity = $product->slsanpham;
				$product_sold = $product->sldaban;

				$product_price = $product->giasanpham;
				$product_giagoc = $product->giagoc;
				$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
				foreach($data['quantity'] as $key2 => $qty){
					if($key==$key2){
						
								$pro_remain = $product_quantity - $qty;
								$product->slsanpham = $pro_remain;
								$product->sldaban = $product_sold + $qty;
								$product->save();
								$sldaban +=$qty;
								$sodonhang +=1;
								$doanhso +=$product_price*$qty;
								$loinhuan=$doanhso-($product_giagoc*$qty);
						}
				}
			}
			
			if($doanhthu_tong>0){
				$doanhthu_update=doanhthu::where('ngaydat',$ngaydat)->first();
				$doanhthu_update->doanhso=$doanhthu_update->doanhso+$doanhso;
				$doanhthu_update->loinhuan=$doanhthu_update->loinhuan+$loinhuan;
				$doanhthu_update->sldaban=$doanhthu_update->sldaban+$sldaban;
				$doanhthu_update->sodonhang=$doanhthu_update->sodonhang+$sodonhang;
				$doanhthu_update->save();
			}else{
				$doanhthu_new= new doanhthu();
				$doanhthu_new->ngaydat=$ngaydat;
				$doanhthu_new->doanhso=$doanhso;
				$doanhthu_new->loinhuan=$loinhuan;	
				$doanhthu_new->sldaban=$sldaban;
				$doanhthu_new->sodonhang=$sodonhang;
				$doanhthu_new->save();
				
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
		// 		$coupon_echo = number_format($coupon_number,0,',','.').'??';
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
		<h1><centerC??ng ty TNHH m???t th??nh vi??n ABCD</center></h1>
		<h4><center>PHI???U ????N H??NG</center></h4>
		<p>Ng?????i ?????t h??ng</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>T??n kh??ch ?????t</th>
						<th>S??? ??i???n tho???i</th>
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

		<p>Th??ng tin ng?????i nh???n</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>T??n ng?????i nh???n</th>
						<th>?????a ch???</th>
						<th>Sdt</th>
						<th>Email</th>
						<th>Ghi ch??</th>
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

		<p>????n h??ng ?????t</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>T??n s???n ph???m</th>
						<th>M?? gi???m gi??</th>
						<th>Ph?? ship</th>
						<th>S??? l?????ng</th>
						<th>Gi?? s???n ph???m</th>
						<th>Th??nh ti???n</th>
					</tr>
				</thead>
				<tbody>';
			
				$total = 0;

				foreach($donhang_chitiet_sanpham as $key => $product){

					$subtotal = (int)$product->giasanpham*(int)$product->product_sales_quantity;
					$total+=$subtotal;

					if($product->product_coupon!='no'){
						$product_coupon = $product->product_coupon;
					}else{
						$product_coupon = 'kh??ng m??';
					}		

		$output.='		
					<tr>
						<td>'.$product->tensanpham.'</td>
						<td>'.$product_coupon.'</td>
						<td>'.number_format($product->product_feeship,0,',','.').'??'.'</td>
						<td>'.$product->product_sales_quantity.'</td>
						<td>'.(int)number_format((int)$product->giasanpham,0,',','.').'.000VN??'.'</td>
						<td>'.(int)number_format($subtotal,0,',','.').'.000VN??'.'</td>
						
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
					
					<p>Ph?? ship: '.number_format($product->product_feeship,0,',','.').'000VN??'.'</p>
					<p>Thanh to??n : '.number_format($total+$product->product_feeship,0,',','.').'000VN??'.'</p>
				</td>
		</tr>';
		$output.='				
				</tbody>
			
		</table>

		<p>K?? t??n</p>
			<table>
				<thead>
					<tr>
						<th width="200px">Ng?????i l???p phi???u</th>
						<th width="800px">Ng?????i nh???n</th>
						
					</tr>
				</thead>
				<tbody>';
						
		$output.='				
				</tbody>
			
		</table>

		';


		return $output;

	}
	

	public function lichsu(Request $request){
		if(!Session::get('customer_id')){
			return redirect('login-checkout')->with('error','Vui l??ng ????ng nh???p ????? xem l???ch s??? ????n h??ng');
		}
		else{

			$tatca_donhang=donhang::where('customer_id',Session::get('customer_id'))->whereNotNull('created_at')->orderby('order_id','desc')->get();

			$baiviet = DB::table('baiviets')->orderby('baiviet_id')->get(); 
		
			$slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
			$meta_desc = "L???ch s??? ????n h??ng"; 
			$meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
			$meta_title = "L???ch s??? ????n h??ng";
			$url_canonical = $request->url();
			$danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
			$sanpham = DB::table('sanphams')
			->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
			->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
			->orderby('sanphams.idsanpham')->paginate(9);
			$thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
			return view('layout.lichsu')->with(compact('tatca_donhang'))->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baiviet',$baiviet);
			
		}
	}
	public function view_lichsudonhang(Request $request,$order_id){
		if(!Session::get('customer_id')){
			return redirect('login-checkout')->with('error','Vui l??ng ????ng nh???p ????? xem l???ch s??? ????n h??ng');
		}
		else{
			$baiviet = DB::table('baiviets')->orderby('baiviet_id')->get(); 
    
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    $meta_desc = "L???ch s??? ????n h??ng"; 
    $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
    $meta_title = "L???ch s??? ????n h??ng";
    $url_canonical = $request->url();
    $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
	$sanpham = DB::table('sanphams')
    ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
    ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
    ->orderby('sanphams.idsanpham')->paginate(9);
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
   //xem l???ch s???
   $donhang_chitiet = donhangchitiet::with('sanpham')->where('order_id',$order_id)->get();
   $donhang = donhang::where('order_id',$order_id)->first();

	$customer_id = $donhang->customer_id;
	$shipping_id = $donhang->shipping_id;
	$order_status = $donhang->order_status;
	
	 
  
  
   $nguoidung = nguoidung::where('customer_id',$customer_id)->first();
   $ship = ship::where('shipping_id',$shipping_id)->first();

   $donhang_chitiet_sanpham = donhangchitiet::with('sanpham')->where('order_id', $order_id)->get();
 
  

	return view('layout.lichsudonhang')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baiviet',$baiviet)->with('donhang_chitiet',$donhang_chitiet)->with('nguoidung',$nguoidung)->with('ship',$ship)->with('donhang',$donhang)->with('order_status',$order_status)->with('order_id',$order_id);
		}
	}
	public function nguoidung(Request $request){
		$this->AuthLogin();
		$nguoidung = DB::table('nguoidungs')->orderby('customer_id','desc')->get(); 
        $manager_product  = view('admin.lietkenguoidung')->with('nguoidung',$nguoidung);
        return view('admin.danhmuc')->with('admin.lietkenguoidung', $manager_product);

	}
	public function xoanguoidung($idnguoidung){
		$this->AuthLogin();
		DB::table('nguoidungs')->where('customer_id',$idnguoidung)->delete();
		Session::put('message','X??a ng?????i d??ng th??nh c??ng');
		return Redirect::to('nguoidung');
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
