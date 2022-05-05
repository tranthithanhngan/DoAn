<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Cart;
use App\Models\Nguoidungs;
use App\Models\ship;
use App\Models\Slider;
use App\Models\donhangchitiet;
use App\Models\donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function login_checkout(Request $request){
        //slide
       $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
       $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
       //seo 
       $meta_desc = "Đăng nhập thanh toán"; 
       $meta_keywords = "Đăng nhập thanh toán";
       $meta_title = "Đăng nhập thanh toán";
       $url_canonical = $request->url();
       //--seo 

       $danhmuc = DB::table('danhmucs')->orderby('id')->get();
       $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 

       return view('layout.login')->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
   }
   public function dangki(Request $request){

    $data = array();
    $data['customer_name'] = $request->customer_name;
    $data['customer_phone'] = $request->customer_phone;
    $data['customer_email'] = $request->customer_email;
    $data['customer_password'] = $request->customer_password;
    $a = DB::table('nguoidungs')->get();
    // dd($a);
    $customer_id = DB::table('nguoidungs')->insertGetId($data,'customer_id'
        
    );
    // dd($customer_id);
    Session::put('customer_id',$customer_id);
    Session::put('customer_name',$request->customer_name);
    return Redirect::to('/checkout');


}

public function dangnhap(Request $request){
    $email = $request->email_account;
    $password = $request->password_account;
    $result = DB::table('nguoidungs')->where('customer_email',$email)->where('customer_password',$password)->first();
    
    
    if($result){
       
        Session::put('customer_id',$result->customer_id);
        return Redirect::to('/checkout');
    }else{
        return Redirect::to('/login-checkout');
    }
    Session::save();

}
public function checkout(Request $request){
    //seo 
    //slide
   $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
   $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
   $meta_desc = "Đăng nhập thanh toán"; 
   $meta_keywords = "Đăng nhập thanh toán";
   $meta_title = "Đăng nhập thanh toán";
   $url_canonical = $request->url();
   //--seo 

   $danhmuc = DB::table('danhmucs')->orderby('id')->get();
   $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
// $city = City::orderby('matp','ASC')->get();

   return view('layout.thongtinnhanhang')->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
}

public function dangkithongtin(Request $request){
    $data = array();
    $data['shipping_name'] = $request->shipping_name;
    $data['shipping_phone'] = $request->shipping_phone;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_notes'] = $request->shipping_notes;
    $data['shipping_address'] = $request->shipping_address;

    $shipping_id = DB::table('ships')->insertGetId($data,'shipping_id');

    Session::put('shipping_id',$shipping_id);
    
    return Redirect::to('/payment');
}
public function payment(Request $request){
    //seo 
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
    $meta_desc = "Đăng nhập thanh toán"; 
    $meta_keywords = "Đăng nhập thanh toán";
    $meta_title = "Đăng nhập thanh toán";
    $url_canonical = $request->url();
    //--seo 
    $danhmuc = DB::table('danhmucs')->orderby('id')->get();
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu','desc')->get(); 
   
return view('layout.payment')->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

}

public function dathang(Request $request){
    //insert payment_method
    //seo 
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
    $meta_desc = "Đăng nhập thanh toán"; 
    $meta_keywords = "Đăng nhập thanh toán";
    $meta_title = "Đăng nhập thanh toán";
    $url_canonical = $request->url();
    //--seo 
    $data = array();
    $data['payment_method'] = $request->payment_option;
    $data['payment_status'] = 1;
    $payment_id = DB::table('tinhtrangs')->insertGetId($data,'payment_id');
// dd($payment_id);
    //insert order
    $order_data = array();
    $order_data['customer_id'] = Session::get('customer_id');
    $order_data['shipping_id'] = Session::get('shipping_id');
    $order_data['payment_id'] = $payment_id;
    $order_data['order_total'] = Cart::total();
    $order_data['order_status'] = 1;
    // dd($order_data);
    $order_id = DB::table('donhangs')->insertGetId($order_data,'order_id');

    //insert order_details
    $content = Cart::content();
    foreach($content as $v_content){
        $order_d_data['order_id'] = $order_id;
        $order_d_data['idsanpham'] = $v_content->id;
        $order_d_data['tensanpham'] = $v_content->name;
        $order_d_data['giasanpham'] = $v_content->price;
        $order_d_data['product_sales_quantity'] = $v_content->qty;
        // dd($order_d_data);
        DB::table('chitietdonhangs')->insert($order_d_data);
    }
    if($data['payment_method']==1){

        echo 'Thanh toán thẻ ATM';

    }elseif($data['payment_method']==2){
        Cart::destroy();

        $danhmuc = DB::table('danhmucs')->orderby('id')->get();
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu','desc')->get(); 
        return view('layout.dathangxong')->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

    }else{
        echo 'Thẻ ghi nợ';

    }
    
    //return Redirect::to('/payment');
}

public function logout_checkout(){
    Session::forget('customer_id');
    return Redirect::to('/login-checkout');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function confirm_order(Request $request){
        $data = $request->all();

        $shipping = new ship();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        // $checkout_code = substr(md5(microtime()),rand(0,26),5);

//  dd($shipping
//     );
        $order = new donhang;
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_total = 1;
        $order->payment_id = 1;
        // $order->order_id = $checkout_code;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();

        if(Session::get('cart')==true){
           foreach(Session::get('cart') as $key => $cart){
             
               $order_details = donhangchitiet::create([
                'idsanpham'=>$cart['idsanpham'] , 
                'tensanpham'=>$cart['tensanpham'],
                'giasanpham'=> $cart['giasanpham'],
                'product_sales_quantity'=> $cart['slsanpham'],
                'order_id'=> 1,
                'product_coupon'=>  $data['order_coupon']
                ,'product_feeship' => $data['order_fee']

               ]);

 
            //    dd($cart['idsanpham']);
            //    $order_details->order_code = $checkout_code;
            //    $order_details->idsanpham = $cart['idsanpham'];
            //    $order_details->tensanpham = $cart['tensanpham'];
            //    $order_details->giasanpham = $cart['giasanpham'];
            //    $order_details->product_sales_quantity = $cart['slsanpham'];
            //    $order_details->product_coupon =  $data['order_coupon'];
            //    $order_details->product_feeship = $data['order_fee'];
            //    $order_details->order_id = 1;
            //    $order_details->save();
           }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
   }
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
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
