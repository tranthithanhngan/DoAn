<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Mail;
use App\Models\Doan;
use App\Models\Slider;
use App\Models\doanhthu;
use App\Models\danhmuc;
use Socialite;
use App\Models\nguoidung;
use App\Models\SocialCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
class DoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $baiviet = DB::table('baiviets')->orderby('baiviet_id')->get(); 
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $meta_desc = "Chuyên bán những đồ dùng cho mẹ và trẻ em"; 
        $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
        $meta_title = "sữa chính hãng, đảm bảo chất lượng tốt cho mẹ và bé";
        $url_canonical = $request->url();
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
       
        $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
        $sanpham = DB::table('sanphams')
        ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
        ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
        ->orderby('sanphams.idsanpham')->paginate(6);
        
        return view('layout.trangchusp')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baiviet',$baiviet);
    }
    public function show_quick_cart(){
        $cart = Session::get('cart');
        
       $customer= Session::get('customer_id');
        $output =' 
        <form >
        '.csrf_field().'
        <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Hình ảnh</td>
                <td class="description">Tên sản phẩm</td>          
                <td class="price">Giá sản phẩm</td>
                <td class="quantity">Số lượng</td>
                <td class="total">Thành tiền</td>
                <td></td>
            </tr>
        </thead>
        <tbody>';
        if($cart==true){
            // <img src="'.url('image/'.$key['image']).'" width="90" alt="'.$key['name'].'" /> 
        $total=0;            
           foreach($cart as $key =>$val){
             $subtotal = (int)$val['price']*(int)$val['qty'];
              $total+=$subtotal;
                                          
                                     $output.='<tr>
                                            <td class="">
                                        
                                                
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href=""></a></h4>
                                                <p>'.$val['name'].'</p>
                                            </td>
                                            <td class="cart_price">
                                                <p>'.(int)number_format((int)$val['price'],0,',','.').'.000 VNĐ</p>
                                            </td>
                                            
                                           
                                            <td class="cart_quantity">
								<div class="cart_quantity_button">
								
									<input class="cart_quantity" style="width:40px;" type="number" min="1" name="cart_qty['.$val['session_id'].']" value="'.$val['qty'].'"  >
								
									
								</div>
							</td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">
                                                    '.(int)number_format($subtotal,0,',','.').'.000VNĐ
                                                    
                                                </p>
                                            </td>
                                            <td class="cart_delete">
                                                 <a class="cart_quantity_delete" id="'.$val['session_id'].'" Onclick="DeleteItemCart(this.id)" ><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>';
                                    }
                                      
                                        $output.=' <tr>
                                            <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm"></td>
                                            <td><a class="btn btn-default check_out" href="'.url('/del-all-product').'">Xóa tất cả</a></td>
                                           
                
                                            <td>';
                                                if(Session::get('customer_id')){
                                                    $output.='  <a class="btn btn-default check_out" href="'.url('/checkout').'">Đặt hàng</a>';
                                                }
                                                 
                                                  else {
                                                  $output.='<a class="btn btn-default check_out" href="'.url('/login-checkout').'">Đặt hàng</a>';
                                                }
                                                $output.=' </td>
                
                                            
                                            <td colspan="2">
                                            <li>Tổng tiền :<span> '.number_format($total,0,',','.').'.000VNĐ</span></li>
                                        </td>
                                        </tr>';
                                             }
                                              else{
                                             $output.='<tr>
                                            <td colspan="5"><center>
                                           <p>Làm ơn thêm sản phẩm vào giỏ hàng</p>
                                            </center></td>
                                        </tr>';
                                            }
                                            $output.=' </tbody>
                
                                    
                
                                </form>
                                  
                
                                </table> </form>';
                                echo $output;
    }
    public function loadsanpham(Request $request)
    {
        $data=$request->all();
        if($data['id']>0){
            $sanpham = DB::table('sanphams')
        ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
        ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
        ->where('idsanpham','<',$data['id'])
        ->orderby('sanphams.idsanpham','desc')->take(6)->get();
        }
        else{
            $sanpham = DB::table('sanphams')
        ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
        ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
        ->orderby('sanphams.idsanpham','desc')->take(6)->get();
        }

      
        $output ='';
        // <form action="{{URL::to('/giohang')}}" method="POST">
       if(!$sanpham->isEmpty()){
        foreach($sanpham as $key =>$pro){
            $last_id=$pro->idsanpham;
            $output.=' <div class="col-sm-4"> 
            <div class="product-image-wrapper">
           
                <div class="single-products">
                        <div class="productinfo text-center">
                       
                    
                                <input type="hidden" value="'.$pro->idsanpham.'" class="cart_product_id_'.$pro->idsanpham.'">
                            <input type="hidden" id="wishlist_tensanpham'.$pro->idsanpham.'" value="'.$pro->tensanpham.'" class="cart_product_name_'.$pro->idsanpham.'">
                          
                            <input type="hidden" value="'.$pro->slsanpham.'" class="cart_product_quantity_'.$pro->idsanpham.'">
                            
                            <input type="hidden"  value="'.$pro->hinhsanpham.'" class="cart_product_image_'.$pro->idsanpham.'">
                            <input type="hidden" value="'.number_format($pro->giasanpham,0,',','.').'VNĐ" id="wishlist_giasanpham'.$pro->idsanpham.'" class="cart_product_price_'.$pro->idsanpham.'">
                            <input type="hidden" value="1" class="cart_product_qty_'.$pro->idsanpham.'">
                           
                            <a id="wishlist_url'.$pro->idsanpham.'" href="'.url('chi-tiet/'.$pro->idsanpham).'">
                                <img id="wishlist_hinhsanpham'.$pro->idsanpham.'" src="'.url('image/'.$pro->hinhsanpham).'" alt="'.$pro->tensanpham.'" />

                                <h2>'.number_format($pro->giasanpham,0,',','.').'VNĐ</h2>
                                <p>'.$pro->tensanpham.'</p>
                             </a>
                             <button class="btn btn-default " id="'.$pro->idsanpham.'" onclick="Addtocart(this.id);">
                             Thêm giỏ hàng
                             </button>
                        </div>
                      
                </div>
           
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <style type="text/css">
                            ul.nav.nav-pills.nav-justified li{
                                text-align: center;
                                font-size: 13px;

                            }
                            .button_wishlist{
                                border:none;
                                background: #ffff;
                                color: #03AFA8;
                            }
                            ul.nav.nav-pills.nav-justified i{
                                color: #03AFA8;
                            }
                            .button_wishlist span:hover{
                                color: #FE980F;
                            }
                            .button_wishlist:focus{
                                border: none;
                                outline: none;
                            }

                        </style>
                        <li><a href="#">
                            <i class="fa fa-plus-square"></i> <button class="button_wishlist" id="'.$pro->idsanpham.'" onclick="add_wishlist(this.id);"><span>Yêu thích</span> </button></a></li>
                      
                    </ul>
                </div>
            </div>
        </div>';
        
     
    
    }
    $output.= ' <div id="load_more">
     <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'"
     id="load_more_button">Thêm sản phẩm</button>
     </div>';
    }
    else {
        $output.= ' <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" 
        id="load_more_button">Hết sản phẩm</button>
        </div>';
    }
    echo $output;
    }
    public function timkiem(Request $request){
        //slide
       $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
       $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
       //seo 
       $meta_desc = "Tìm kiếm sản phẩm"; 
       $meta_keywords = "Tìm kiếm sản phẩm";
       $meta_title = "Tìm kiếm sản phẩm";
       $url_canonical = $request->url();
       //--seo
       $keywords = $request->keywords_submit;

       $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
       $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 

       $timkiem_sp = DB::table('sanphams')->where('tensanpham','like','%'.$keywords.'%')->get(); 


       return view('layout.timkiem')->with('baivietpost', $baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('timkiem_sp',$timkiem_sp)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sendmail()    {
        
        $to_name = "Thanh Ngan";
        $to_email = "tranthanhngan2000@gmail.com"; //mail khách hàng
        $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>"Mail gửi về vấn đề hàng hóa");
        Mail::send('layout.sendmail',$data,function($message) use ($to_name,$to_email){

            $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
       return  redirect('/')->with('message',' '); 
    }
public function locketqua(Request $request){
    $data= $request->all();
    $from_date= $data['from_date'];
    $to_date=$data['to_date'];
  
   $get=doanhthu::whereBetween('ngaydat',[ $from_date,$to_date ])->orderBy('ngaydat','DESC')->get();
// dd($get);
   foreach($get as $key=>$val){
       $chart_data[]=array(
           'ngaydat'=>$val->ngaydat,
           'doanhso'=>$val->doanhso,
           'loinhuan'=>$val->loinhuan,
           'sldaban'=>$val->sldaban,
           'sodonhang'=>$val->sodonhang,
       );
       
   }
   echo $data=json_encode($chart_data);
  
}
public function dashboard_filter(Request $request){
    $data= $request->all();
    //  $today=Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
     $dauthangnay=Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
     $dau_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
     $cuoi_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
     $sub1days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(1)->toDateString();
     $sub7days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
     $sub365days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
     $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
     if($data['dashboard_value']=='1ngay'){
        $get=doanhthu::whereBetween('ngaydat',[$sub1days,$now])->orderBy('ngaydat','DESC')->get();
     }
     else if($data['dashboard_value']=='7ngay'){
        $get=doanhthu::whereBetween('ngaydat',[$sub7days,$now])->orderBy('ngaydat','DESC')->get();
     }
     else if($data['dashboard_value']=='1ngay'){
        $get=doanhthu::whereBetween('ngaydat',[$sub1days,$now])->orderBy('ngaydat','DESC')->get();
     }
     else if($data['dashboard_value']=='thangtruoc'){
        $get=doanhthu::whereBetween('ngaydat',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('ngaydat','DESC')->get();
     }
     else if($data['dashboard_value']=='thangnay'){
        $get=doanhthu::whereBetween('ngaydat',[$dauthangnay,$now])->orderBy('ngaydat','DESC')->get();
     }
     else{
        $get=doanhthu::whereBetween('ngaydat',[$sub365days,$now])->orderBy('ngaydat','DESC')->get();
     }
     foreach($get as $key => $val){
        $chart_data[]=array(
            'ngaydat'=>$val->ngaydat,
            'doanhso'=>$val->doanhso,
            'loinhuan'=>$val->loinhuan,
            'sldaban'=>$val->sldaban,
            'sodonhang'=>$val->sodonhang,
        );
     }
  
     echo $data=json_encode($chart_data);
  
}
public function thangngay (Request $request){
    $sub30days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
    $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $get=doanhthu::whereBetween('ngaydat',[ $sub30days,$now])->orderBy('ngaydat','ASC')->get();
    foreach($get as $key => $val){
        $chart_data[]=array(
            'ngaydat'=>$val->ngaydat,
            'doanhso'=>$val->doanhso,
            'loinhuan'=>$val->loinhuan,
            'sldaban'=>$val->sldaban,
            'sodonhang'=>$val->sodonhang,
        );
     }
  
     echo $data=json_encode($chart_data);
}

    public function create()
    {
        //
        return view('layout.chitietsp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'tendanhmuc'=>'required',
           
          ]);
          $share = new danhmuc([
            'tendanhmuc' => $request->get('tendanhmuc'),
           
          ]);
          $share->save();
         
        // $this->UpdateStatus($share,"1");         
        //   return redirect('/sharesnophoso')->with('success', 'Stock has been added');
        // $tendanhmuc=$share->id;
        return view('admin.danhmuc');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doan  $doan
     * @return \Illuminate\Http\Response
     */
    public function loadfb(){
        config(['services.facebook.redirect'=>env('FACEBOOK_CLIENT_REDIRECT')]);
        return Socialite::driver('facebook')->redirect();
    }
    public function customer_facebook_callback(){
        config(['services.facebook.redirect'=>env('FACEBOOK_CLIENT_REDIRECT')]);
       $provider = Socialite::driver('facebook')->user();
  
       $account = SocialCustomers::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
       if($account!=NULL){
           $account_name= nguoidung::where('customer_id',$account->user)->first();
           Session::put('customer_id',$account_name->customer_id);
           Session::put('customer_name',$account_name->customer_name);

           return redirect('/login-checkout')->with('message','Đăng nhập bằng tài khoản facebook <span style="color:red">'.$account_name->customer_email.'</span>thành công');
       }
       elseif($account==NULL){
           $customer_login= new SocialCustomers([
            'provider_user_id'=>$provider->getId(),
            'provider_user_email'=>$provider->getEmail(),
            'provider'=>'facebook'
           ]);
           $customer = nguoidung::where('customer_email',$provider->getEmail())->first();
           if(!$customer){
               $customer=nguoidung::create([
                   'customer_name'=>$provider->getName(),
                   'customer_email'=>$provider->getEmail(),
                   'customer_password'=>'',
                   'customer_phone'=>'',
               ]);
           }
           $customer_login->nguoidung()->associate($customer);
           $customer_login->save();

           $account_new= nguoidung::where('customer_id',$customer_login->user)->first();
           Session::put('customer_id',$account_new->customer_id);
           Session::put('customer_name',$account_new->customer_name);
           return redirect('/login-checkout')->with('message','Đăng nhập bằng tài khoản facebook <span style="color:red">'.$account_new->customer_email.'</span>thành công');
       }
    }
   
    public function show(danhmuc $danhmuc)
    {
        //
        
        $danhmucs =danhmuc::all();
      
        return view('admin.showdanhmuc', compact('danhmucs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doan  $doan
     * @return \Illuminate\Http\Response
     */
    public function edit(Doan $doan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doan  $doan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doan $doan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doan  $doan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doan $doan)
    {
        //
    }
}
