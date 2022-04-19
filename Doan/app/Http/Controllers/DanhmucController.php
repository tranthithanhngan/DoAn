<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Models\danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class DanhmucController extends Controller
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
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function themdanhmuc(){
        $this->AuthLogin();
    	return view('admin.themdanhmuc');
    }
    public function luudanhmuc(Request $request){
        $this->AuthLogin();
       
        $request->validate([
            'tendanhmuc'=>'required',
           
          ]);
          $share = new danhmuc([
            'tendanhmuc' => $request->get('tendanhmuc'),
           
          ]);
          $share->save();
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('themdanhmuc');
    }
    public function showdanhmuc(){
        $this->AuthLogin();
    	$showdanhmuc = DB::table('danhmucs')->paginate(5);
        
       
    	$manager_category_product  = view('admin.lietkedanhmuc')->with('showdanhmuc',$showdanhmuc);
    	return view('admin.danhmuc')->with('admin.lietkedanhmuc', $manager_category_product);


    }
    public function suadanhmuc($id){
        $this->AuthLogin();
        $suadanhmuc = DB::table('danhmucs')->where('id',$id)->get();

        $manager_category_product  = view('admin.suadanhmuc')->with('suadanhmuc',$suadanhmuc);

        return view('admin.danhmuc')->with('admin.suadanhmuc', $manager_category_product);
    }
    public function capnhatdanhmuc(Request $request,$id){
        $this->AuthLogin();
        $data = array();
        $data['tendanhmuc'] = $request->tendanhmuc;
       
        DB::table('danhmucs')->where('id',$id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('showdanhmuc');
    }
    public function xoadanhmuc($id){
        $this->AuthLogin();
        DB::table('danhmucs')->where('id',$id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('showdanhmuc');
    }

    public function showtendanhmuc($iddanhmuc){
        // //slide
        //  $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
 
         $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
         $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
 
         $danhmuc_by_id = DB::table('sanphams')->join('danhmucs','sanphams.iddanhmuc','=','danhmucs.id')->where('danhmucs.id',$iddanhmuc)->get();
   
        //  $danhmuc_name = DB::table('danhmucs')->where('danhmucs.id',$iddanhmuc)->limit(1)->get();
         
          
 
         return view('layout.trangchusp')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('danhmuc_by_id',$danhmuc_by_id);
     }
     public function showthuonghieudanhmuc($iddanhmuc){
        // //slide
        //  $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
 
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
    $sanpham = DB::table('sanphams')->orderby('idsanpham')->get();
    
    $danhmuc_by_id = DB::table('thuonghieus')->join('danhmucs','thuonghieus.iddanhmuc','=','danhmucs.id')->where('danhmucs.id',$iddanhmuc)->paginate(6);

    $danhmuc_name = DB::table('danhmucs')->where('danhmucs.id',$iddanhmuc)->limit(1)->get();

    // dd($thuonghieu_name);
    // foreach($brand_name as $key => $val){
    //     //seo 
    //     $meta_desc = $val->brand_desc; 
    //     $meta_keywords = $val->brand_desc;
    //     $meta_title = $val->brand_name;
    //     $url_canonical = $request->url();
    //     //--seo
    // }
     
    return view('layout.hiendanhmuc')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('danhmuc_by_id',$danhmuc_by_id)->with('danhmuc_name',$danhmuc_name)->with('sanpham',$sanpham);
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
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function show(danhmuc $danhmuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function edit(danhmuc $danhmuc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, danhmuc $danhmuc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\danhmuc  $danhmuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(danhmuc $danhmuc)
    {
        //
    }
}
