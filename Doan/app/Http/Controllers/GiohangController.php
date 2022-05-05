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
        // dd($request);
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
        // dd(Cart::add($data));
        Cart::setGlobalTax(2);

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
    

    public function capnhatgiohang(Request $request){
        $rowId = $request->rowId_giohang;
        $qty = $request->cart_capnhat;
        Cart::update($rowId,$qty);
        return Redirect::to('/showgiohang');
    }
    public function capnhatgiohang2(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
       
        if($cart==true){
            $message = '';

            foreach($data['cart_qty'] as $key => $qty){
                $i = 0;
                foreach($cart as $session => $val){
                    $i++;

                    if($val['session_id']==$key && $qty<$cart[$session]['slsanpham']){

                        $cart[$session]['slsanpham'] = $qty;
                        $message.='<p style="color:blue">'.$i.') Cập nhật số lượng :'.$cart[$session]['tensanpham'].' thành công</p>';

                    }elseif($val['session_id']==$key && $qty>$cart[$session]['slsanpham']){
                        $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$cart[$session]['tensanpham'].' thất bại</p>';
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
        // Session::forget('cart');
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        // dd($cart);
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                $filtered = $val->contains('id', $data['cart_product_id']);
                if($filtered){
                    $is_avaiable++;
                }
          }
            // dd($is_avaiable);
            if($is_avaiable == 0){
     
                $cart = array(
                    'id' => (int)$data['cart_product_id'],
                    'name' => $data['cart_product_name'],
                    'weight' => $data['cart_product_quantity'],
                    'qty' => $data['cart_product_qty'],
                    'price' => $data['cart_product_price'],
                    'options' => array(
                       "image"=> $data['cart_product_image'],
                    ) 
                );
                Cart::add($cart);
                // dd($cart);
                // Session::put('cart',$cart);
            }
        }else{
            
            $cart = array(
               
                // 'session_id' => $session_id,
                'id' => (int)$data['cart_product_id'],
                'name' => $data['cart_product_name'],
                'weight' => $data['cart_product_quantity'],
                'qty' => $data['cart_product_qty'],
                'price' => $data['cart_product_price'],
                'options' => array(
                   "image"=> $data['cart_product_image'],
                ) 
            );
              Cart::add($cart);

            // Session::put('cart',$cart);

        }
        // Session::save();
        return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');

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
