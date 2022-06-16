<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Cart;
use Mail;
use Carbon\Carbon;
use App\Models\nguoidung;
use App\Models\Nguoidungs;
use App\Models\ship;
use App\Models\Slider;
use App\Models\donhangchitiet;
use App\Models\donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

   public function quenmatkhau(Request $request){
    $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
    
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    $meta_desc = "Quên mật khẩu"; 
    $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
    $meta_title = "Quên mật khẩu";
    $url_canonical = $request->url();
    $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
   
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
    $sanpham = DB::table('sanphams')
    ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
    ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
    ->orderby('sanphams.idsanpham')->paginate(9);
    
    return view('layout.quenmatkhau')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baivietpost',$baivietpost);
}

public function laylaimk(Request $request){
   $data=$request->all();
   $now= Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
   $title_mail="Lấy lại mật khẩu".' '.$now;
  $token= Str::random();

  $customer =Nguoidungs::where('customer_email','=',$data['email_account'])->get();
  foreach($customer as $key=>$value){
      $customer_id=$value->customer_id;
  }
 if($customer){
     $count_customer=$customer->count();
    if($count_customer ==0){
        return redirect()->back()->with('error','Email chưa được đăng ký để khôi phục mật khẩu');
    }
    else{
        $token_random= Str::random();
        $customer =Nguoidungs::find($customer_id);
        $customer->customer_token=$token_random;
        $customer->save();

        $to_email=$data['email_account'];
        $link=url('/updatemkmail?email='.$to_email.'&token='.$token_random);

        $data=array("name"=>$title_mail,"body"=>$link,"email"=>$data['email_account']);
        Mail::send('mail.laylaimk',['data'=>$data],function($message) use($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        } );
        return redirect()->back()->with('message','Gửi Email thành công,vui lòng vào email để reset password');
    }
 }

}

public function update_new_password(Request $request){
    $data=$request->all();
    
   $token= Str::random();
 
   $customer =Nguoidungs::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
  $count=$customer->count();
  if($count>0){
    foreach($customer as $key=>$value){
        $customer_id=$value->customer_id;
    }

    $reset =Nguoidungs::find($customer_id);
    $reset->customer_password=$data['password_account'];
    $reset->customer_token=$token;
    $reset->save();
    return redirect('login-checkout')->with('message','Mật khẩu đã được cập nhật');
     }
     else{
        return redirect('quenmatkhau')->with('error','Vui lòng nhập lại email vì link quá hạn');
  }
}

public function updatemkmail(Request $request){
    $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
    
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    $meta_desc = "Quên mật khẩu"; 
    $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
    $meta_title = "Quên mật khẩu";
    $url_canonical = $request->url();
    $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
   
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
    $sanpham = DB::table('sanphams')
    ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
    ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
    ->orderby('sanphams.idsanpham')->paginate(9);
    
    return view('mail.new_pass')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baivietpost',$baivietpost);
    
}
   public function dangki(Request $request){

    $data = array();
    $data['customer_name'] = $request->customer_name;
    $data['customer_phone'] = $request->customer_phone;
    $data['customer_email'] = $request->customer_email;
    $data['customer_password'] = $request->customer_password;
    $data['customer_token'] = Str::random();
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
$cart = Session::get('cart');
   return view('layout.thongtinnhanhang')->with('cart',$cart)->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
}

public function dangkithongtin(Request $request){
   
    $data = array();
    $data['shipping_name'] = $request->shipping_name;
    $data['shipping_phone'] = $request->shipping_phone;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_notes'] = $request->shipping_notes;
    $data['shipping_address'] = $request->shipping_address;
    $data['shipping_method'] = $request->payment_select;
    $shipping_id = DB::table('ships')->insertGetId($data,'shipping_id');

    Session::put('shipping_id',$shipping_id);
    
    return Redirect::to('/checkout');
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
    $cart = Session::get('cart');
return view('layout.payment')->with('cart',$cart)->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

}
public function vnpay(Request $request){
    
    $data= $request->all();
    $code = rand(00,9999);
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/checkout";
    $vnp_TmnCode = "TZIKCEOY";//Mã website tại VNPAY 
    $vnp_HashSecret = "ZFVVHVKWMZZTRFNYZXHWQLQAMOWMMLZC"; //Chuỗi bí mật

    $vnp_TxnRef = $code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = 2000000*100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    // $vnp_ExpireDate = $_POST['txtexpire'];
    //Billing
   
    $inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef
    // "vnp_ExpireDate"=>$vnp_ExpireDate
  
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
      }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momo(Request $request){
       
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $serectkey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = "10000";
        $orderId = time() ."";
        $redirectUrl = "http://127.0.0.1:8000";
        $ipnUrl = "http://127.0.0.1:8000";
        $extraData = "";
        
            $requestId = time() . "";
            $requestType = "payWithATM";
           
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
          
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
           
        
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
    $data['payment_status'] = "Đang chờ xử lí";
    $payment_id = DB::table('tinhtrangs')->insertGetId($data,'payment_id');

     $today=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    //insert order
    $order_data = array();
    $order_data['customer_id'] = Session::get('customer_id');
    $order_data['shipping_id'] = Session::get('shipping_id');

    // $order_data['payment_id'] = $payment_id;
    // $order_data['order_total'] = Cart::total();
    $order_data['order_status'] = 1;
    $order_data['ngaydat'] =  $today;
  
    
    $order_id = DB::table('donhangs')->insertGetId($order_data,'order_id');

    //insert order_details
    // $content = Cart::content();
    $CartShop=Session::get('cart');
  
    foreach($CartShop as $v_content){
        $order_d_data['order_id'] = $order_id;
        $order_d_data['idsanpham'] = $v_content['id'];  
        $order_d_data['tensanpham'] = $v_content['name'];
        $order_d_data['giasanpham'] = $v_content['price'];
        $order_d_data['product_sales_quantity'] = $v_content['qty'];
        // dd($order_d_data);
        DB::table('chitietdonhangs')->insert($order_d_data);
    }


    if($data['payment_method']==1){

    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://127.0.0.1:8000/checkout";
    $vnp_TmnCode = "TZIKCEOY";//Mã website tại VNPAY 
    $vnp_HashSecret = "ZFVVHVKWMZZTRFNYZXHWQLQAMOWMMLZC"; //Chuỗi bí mật

    $vnp_TxnRef = '123'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = 100000 * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    // $vnp_ExpireDate = $_POST['txtexpire'];
    //Billing
   
    $inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef
    // "vnp_ExpireDate"=>$vnp_ExpireDate
  
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
      }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }elseif($data['payment_method']==2){
        Cart::destroy();

        $danhmuc = DB::table('danhmucs')->orderby('id')->get();
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu','desc')->get(); 
    $cart = Session::get('cart');
    if($cart==true){
        
        Session::forget('cart');
        Session::forget('coupon');
    }
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
        // $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new donhang;
      
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $ngaydat=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d ');

        $order->created_at = $today;
        $order->ngaydat = $ngaydat;
        // $order->save();
        if(Session::get('cart')==true){
            $CartShop=Session::get('cart');
           foreach($CartShop as $cart=>$val){
                 $order_details= new donhangchitiet;  
               $order_details->order_id = $order->order_id;
               $order_details->idsanpham = $val['id'];
               $order_details->tensanpham = $val['name'];
               $order_details->giasanpham = $val['price'];
               $order_details->product_sales_quantity = $val['qty'];
            //    $order_details->save();
           }
        }

        $now=Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail="Đơn hàng xác nhận ngày".' '.$now;
        $customer= Nguoidungs::find(Session::get('customer_id'));
        $data['email'][]=$customer->customer_email;
        if(Session::get('cart')==true){
            $CartShop=Session::get('cart');
            
       foreach(Session::get('cart') as $cart_mail=>$val){
          
         $cart_array[]=array(
             'tensanpham'=>$val['name'],
            'giasanpham'=>$val['price'],
            'slsanpham'=>$val['qty'],
           
         );
         
       }
    }

            $shipping_array= array(
            'customer_name'=> $customer->customer_name,
            'shipping_name'=>$data['shipping_name'],
            'shipping_email'=>$data['shipping_email'],
            'shipping_phone'=>$data['shipping_phone'],
            'shipping_address'=>$data['shipping_address'],
            'shipping_notes'=>$data['shipping_notes'],
            'shipping_method'=>$data['shipping_method'],
            );
       $order_mail=array(
        'order_id'=>$order->order_id,
       );
        

        Mail::send('mail.mail_donhang',['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'code'=>$order_mail],
        function($message)use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        // Session::forget('coupon');
        // Session::forget('fee');
        // Session::forget('cart');
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
