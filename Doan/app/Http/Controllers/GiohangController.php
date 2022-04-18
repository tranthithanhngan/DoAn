<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
use App\Models\giohang;
use Illuminate\Http\Request;

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
        Cart::add($data);
        Cart::setGlobalTax(2);
        // Cart::destroy();
        return Redirect::to('/showgiohang');
        // return view('layout.giohang')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu);
    }
    public function showgiohang(Request $request){
        //seo 
        $meta_desc = "Giỏ hàng của bạn"; 
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();
        //--seo
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
        return view('layout.giohang')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
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
