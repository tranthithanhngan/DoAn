<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Toastr;
use App\Models\danhmuc;
use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
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
        
        // $admin_id =  Session::get('admin_id');
        $admin_id =  Auth::id();
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
    	$showdanhmuc = DB::table('danhmucs')->get();
        
       
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
        // Session::put('message','Cập nhật danh mục sản phẩm thành công');
        Toastr::success('Cập nhật danh mục sản phẩm thành công','Thành công');
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
     public function showthuonghieudanhmuc(Request $request,$iddanhmuc){
        // //slide
         $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
         $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
        $meta_desc = "Chuyên bán những đồ dùng cho mẹ và trẻ em"; 
        $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
        $meta_title = "sữa chính hãng, đảm bảo chất lượng tốt cho mẹ và bé";
        $url_canonical = $request->url();
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
        $sanpham = DB::table('sanphams')->where('iddanhmuc',$iddanhmuc)->orderby('idsanpham','desc')->get();
      
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
     
    return view('layout.hiendanhmuc')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('danhmuc_by_id',$danhmuc_by_id)->with('danhmuc_name',$danhmuc_name)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baivietpost',$baivietpost);
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
