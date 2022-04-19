<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Models\donhang;
use App\Models\SP;
use App\Models\ship;
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
        ->select('donhangs.*','nguoidungs.customer_name')
        ->orderby('donhangs.order_id')->paginate(5);
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

		foreach($donhang_chitiet_sanpham as $key => $order_d){

			$product_coupon = $order_d->product_coupon;
		}
		if($product_coupon != 'no'){
			$coupon = Giamgia::where('coupon_code',$product_coupon)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		}else{
			$coupon_condition = 2;
			$coupon_number = 0;
		}
       
		
        return view('admin.xemdonhang')->with(compact('donhang_chitiet','nguoidung','ship','donhang_chitiet_sanpham','coupon_condition','coupon_number','donhang','order_status'));
    	
      
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
