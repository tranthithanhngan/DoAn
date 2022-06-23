<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
use App\Models\giohang;
use App\Models\Slider;
use Illuminate\Http\Request;
session_start();
class GiohangController extends Controller
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
    public function luugiohang(Request $request){
        $idsanpham = $request->productid_hidden;
        $slsp = $request->sl;
        $sp_info = DB::table('sanphams')->where('idsanpham',$idsanpham)->first(); 
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        // $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        // $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
     
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $sp_info->idsanpham;
        $data['qty'] = $slsp;
        $data['name'] = $sp_info->tensanpham ;
        $data['price'] = $sp_info->giasanpham ;
        $data['weight'] = $sp_info->giasanpham;
        $data['options']['image'] = $sp_info->hinhsanpham;
       
        // dd($data);
        Cart::add($data);
        
        // Cart::setGlobalTax(2);
        // Cart::destroy();
        return Redirect::to('/showgiohang');
        // return view('layout.giohang')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu);
    }
    public function showgiohang(Request $request){


      
        //seo 
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $meta_desc = "Giỏ hàng của bạn"; 
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();
        $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
        //--seo
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 

        return view('layout.giohang')->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
    }
      public function xoagiohang($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/showgiohang');
    }
    
    public function showgiohangmenu(){
        $cart =  count(Session::get('cart'));
     if($cart>0){
        $output='';
        $output.= ' <li><a href="'.url('/gio-hang').'"><i class="fa fa-shopping-cart"></i>
        Giỏ hàng
       <span class="badges" style="background:red;padding:5px;border-radius:10px;font-size:14px;font-weight:bold;color:#fff">'.$cart.'</span>
   </a></li>';}else {
    $output.= ' <li><a href="'.url('/gio-hang').'"><i class="fa fa-shopping-cart"></i>
    Giỏ hàng
   <span class="badges" style="background:red;padding:5px;border-radius:10px;font-size:14px;font-weight:bold;color:#fff">0</span>
</a></li>';
   }
   echo $output;
    }
    public function capnhatgiohang(Request $request){
        $rowId = $request->rowId_giohang;
        $qty = $request->cart_capnhat;
        Cart::update($rowId,$qty);
        return Redirect::to('/showgiohang');
    }
    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
       
        if($cart==true){
            $message = '';

            foreach($data['cart_qty'] as $key => $qty){
                $i = 0;
                foreach($cart as $session => $val){
                    $i++;

                    if($val['session_id']==$key && $qty<$cart[$session]['product_quantity']){

                        $cart[$session]['product_qty'] = $qty;
                        $message.='<p style="color:blue">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'].' thành công</p>';

                    }elseif($val['session_id']==$key && $qty>$cart[$session]['product_quantity']){
                        $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'].' thất bại</p>';
                    }

                }

            }

            Session::put('cart',$cart);
            return redirect()->back()->with('message',$message);
        }else{
            return redirect()->back()->with('message','Cập nhật số lượng thất bại');
        }
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        
        if($cart==true){ 
            $is_avaiable = 0;
            foreach($cart as $key ){
        
                if($key['id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
                // $filtered = $val->contains('id', (int)$data['cart_product_id']);
                // if($filtered){
                //     $is_avaiable++;
                // }
             
                // $cart[$key] = array(
                //     'id' => (int)$key['id'],
                //     'name' => $key['name'],
                //     'weight' => $key['weight'],
                //     'qty' =>$key['qty']+ $data['cart_product_qty'],
                //     'price' => $key['price'],
                //     'options' => array(
                //        "image"=> $data['cart_product_image'],
                //     ) 
                   
                  
                //     );
                // //     Cart::add($cart);
                //     Session::put('cart',$cart);
          }
         
         
            if($is_avaiable == 0){
               
                $cart[] = array(
                    'session_id' => $session_id,
                    'id' => $data['cart_product_id'],
                    'name' => $data['cart_product_name'],
                    'weight' => $data['cart_product_quantity'],
                    'qty' => $data['cart_product_qty'],
                    'price' => $data['cart_product_price'],
                    'options' => array(
                       "image"=> $data['cart_product_image'],
                    ) 
                );
               
                // Cart::add($cart);
          
                Session::put('cart',$cart);
            }
        }
        else{
         
            $cart[] = array(
                'session_id' => $session_id,
                'id' => $data['cart_product_id'],
                'name' => $data['cart_product_name'],
                'weight' => $data['cart_product_quantity'],
                'qty' => $data['cart_product_qty'],
                'price' => $data['cart_product_price'],
                'options' => array(
                   "image"=> $data['cart_product_image'],
                ) 
            );
            //   Cart::add($cart);
         
            Session::put('cart',$cart);

        }
       
        Session::save();
        // return response('Hello World', 200)
        //           ->header('Content-Type', 'text/plain');

    }        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gio_hang(Request $request){
        //seo 
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

       $meta_desc = "Giỏ hàng của bạn"; 
       $meta_keywords = "Giỏ hàng Ajax";
       $meta_title = "Giỏ hàng Ajax";
       $url_canonical = $request->url();
       //--seo

       $danhmuc = DB::table('danhmucs')->orderby('id','desc')->get(); 
        $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu','desc')->get(); 
        $cart = Session::get('cart');
         

       return view('layout.giohangajax')->with('cart',$cart)->with('thuonghieu',$thuonghieu)->with('danhmuc',$danhmuc)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
   }
   public function delete_all_product(){
    $cart = Session::get('cart');
    if($cart==true){
        // Session::destroy();
        Session::forget('cart');
        Session::forget('coupon');
        return redirect()->back()->with('message','Xóa hết giỏ thành công');
    }
}
   public function delete_product($session_id){
    $cart = Session::get('cart');
   
    if($cart==true){
        foreach($cart as $key =>$val){
          
            if($val['session_id']==$session_id){
                unset($cart[$key]);
            }
        }
        Session::put('cart',$cart);
        return redirect()->back()->with('message','Xóa sản phẩm thành công');

    }else{
        return redirect()->back()->with('message','Xóa sản phẩm thất bại');
    }

}
public function update_cart1(Request $request){
    $data = $request->all();
    $cart = Session::get('cart');
    if($cart==true){
        $message = '';

        foreach($data['cart_qty'] as $key => $qty){
            $i = 0;
            foreach($cart as $session => $val){
                $i++;

                if($val['session_id']==$key && $qty<$cart[$session]['weight']){

                    $cart[$session]['qty'] = $qty;
                    $message.='<p style="color:blue">'.$i.') Cập nhật số lượng :'.$cart[$session]['name'].' thành công</p>';

                }elseif($val['session_id']==$key && $qty>$cart[$session]['weight']){
                    $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$cart[$session]['name'].' thất bại</p>';
                }

            }

        }

        Session::put('cart',$cart);
        return redirect()->back()->with('message',$message);
    }else{
        return redirect()->back()->with('message','Cập nhật số lượng thất bại');
    }
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
     * @param  \App\Models\giohang  $giohang
     * @return \Illuminate\Http\Response
     */
    public function show(giohang $giohang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\giohang  $giohang
     * @return \Illuminate\Http\Response
     */
    public function edit(giohang $giohang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\giohang  $giohang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, giohang $giohang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\giohang  $giohang
     * @return \Illuminate\Http\Response
     */
    public function destroy(giohang $giohang)
    {
        //
    }
}
