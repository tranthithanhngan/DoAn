<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Socialite;
use App\Models\baiviet;
use App\Models\baivietchitiet;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class BaivietController extends Controller
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
    public function thembaiviet(){
        $this->AuthLogin();
    	return view('admin.thembaiviet');
    }
    public function them_baiviet(Request $request){
    	
    	$this->AuthLogin();

   		$data = $request->all();
      
      
      

            $baiviet = new baiviet();
            $baiviet->baiviet_name = $data['baiviet_name'];
          
            $baiviet->baiviet_status = $data['baiviet_status'];
           
           	$baiviet->save();
            Session::put('message','Thêm bài viết thành công');
            return Redirect::to('thembaiviet');
       
       	
    }
    public function showbaiviet(){
    	$all_baiviet = baiviet::orderBy('baiviet_id')->get();
    	return view('admin.lietkebaiviet')->with(compact('all_baiviet'));
    }
    public function suabaiviet($baiviet_id){
        $this->AuthLogin();
       $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
      
       $suabaiviet = DB::table('baiviets')->where('baiviet_id',$baiviet_id)->get();
    
       $manager_baiviet  = view('admin.suabaiviet')->with('suabaiviet', $suabaiviet)->with('danhmuc',$danhmuc);
    
       return view('admin.danhmuc')->with('admin.suabaiviet', $manager_baiviet);
    }
    public function capnhatbaiviet(Request $request,$baiviet_id){
        $this->AuthLogin();
        $data = array();
        $data['baiviet_name'] = $request->baiviet_name;
    
       DB::table('baiviets')->where('baiviet_id',$baiviet_id)->update($data);
       Session::put('message','Cập nhật bài viết thành công');
       return Redirect::to('showbaiviet');
    }
    public function deletebaiviet($baiviet_id){
        $this->AuthLogin();
        DB::table('baiviets')->where('baiviet_id',$baiviet_id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('showbaiviet');
    }
    public function showdanhmucbaiviet(Request $request ,$baiviet_id){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
 
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
    $sanpham = DB::table('sanphams')->orderby('idsanpham')->get();
    $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
   
    $baiviet =baiviet::where('baiviet_id',$baiviet_id)->take(1)->get();
    foreach($baiviet as $key => $cate)
    {
        $meta_desc = "Chuyên bán những đồ dùng cho mẹ và trẻ em"; 
        $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
        $meta_title = "Danh mục bài viết";
        $cate_id= $cate->baiviet_id;
        $url_canonical = $request->url();
    }
   
   $baivietchitiet = baivietchitiet::with('baiviet')->where('baiviet_id',$cate_id)->paginate(10);

  
        return view('layout.baiviet')->with('baivietchitiet',$baivietchitiet)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baiviet',$baiviet)->with('baivietpost',$baivietpost);
    }



    public function thembaivietchitiet(){
        $this->AuthLogin();
        $baiviet = DB::table('baiviets')->orderby('baiviet_id')->get(); 
       
    	return view('admin.thembaivietchitiet')->with('baiviet',$baiviet);
    }
    public function them_baivietchitiet(Request $request){
    	
    	$this->AuthLogin();
       $data = array();
       $data['baivietcon_name'] = $request->baivietcon_name;
       $data['baivietcon_sum'] = $request->baivietcon_sum;
    
       $data['baivietcon_content'] = $request->baivietcon_content;
      
       $data['baiviet_id'] = $request->baiviet_id;
       
       $data['hinhbaivietcon'] = $request->hinhbaivietcon;
       
               $get_image = $request->file('hinhbaivietcon');
     
               if($get_image){
                   $get_name_image = $get_image->getClientOriginalName();
                   $name_image = current(explode('.',$get_name_image));
                   $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                   $get_image->move('image',$new_image);
                   $data['hinhbaivietcon'] = $new_image;
                   DB::table('baivietcons')->insert($data);
                   Session::put('message','Thêm sản phẩm thành công');
                   return Redirect::to('thembaivietchitiet');
               }
               $data['hinhbaivietcon'] = '';
               DB::table('baivietcons')->insert($data);
            Session::put('message','Thêm bài viết chi tiết thành công');
            return Redirect::to('thembaivietchitiet');
       
       	
    }
    public function showbaivietchitiet(){
        $this->AuthLogin();
        $showbaivietchitiet = DB::table('baivietcons')
        ->join('baiviets','baiviets.baiviet_id','=','baivietcons.baiviet_id')
       
        ->orderby('baivietcons.baivietcon_id')->get();
        $manager_product  = view('admin.lietkebaivietchitiet')->with('showbaivietchitiet',$showbaivietchitiet);
        return view('admin.danhmuc')->with('admin.lietkebaivietchitiet', $manager_product);
    
    }
    public function suabaivietchitiet($baivietchitiet_id){
     
        $this->AuthLogin();
       $baiviet = DB::table('baiviets')->orderby('baiviet_id')->get(); 
      
       $suabaiviet = DB::table('baivietcons')->where('baivietcon_id',$baivietchitiet_id)->get();
    
       $manager_baivietchitiet  = view('admin.suabaivietchitiet')->with('suabaiviet', $suabaiviet)->with('baiviet',$baiviet);
    
       return view('admin.danhmuc')->with('admin.suabaivietchitiet', $manager_baivietchitiet);
    }
    public function capnhatbaivietchitiet(Request $request,$baivietchitiet_id){
        $this->AuthLogin();
        $data = array();
        $data['baivietcon_name'] = $request->baivietcon_name;
        $data['baivietcon_sum'] = $request->baivietcon_sum;
     
        $data['baivietcon_content'] = $request->baivietcon_content;
       
        $data['baiviet_id'] = $request->baiviet_id;
        
        $data['hinhbaivietcon'] = $request->hinhbaivietcon;
        
        $get_image = $request->file('hinhbaivietcon');
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('image',$new_image);
                    $data['hinhbaivietcon'] = $new_image;
                    DB::table('baivietcons')->where('baivietcon_id',$baivietchitiet_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('showbaivietchitiet');
        }
              
       
       DB::table('baivietcons')->where('baivietcon_id',$baivietchitiet_id)->update($data);
       Session::put('message','Cập nhật bài viết thành công');
       return Redirect::to('showbaivietchitiet');
    }
    public function deletebaivietchitiet($baivietchitiet_id){
        $this->AuthLogin();
        DB::table('baivietcons')->where('baivietcon_id',$baivietchitiet_id)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('showbaivietchitiet');
    }
    
    public function xembaiviet(Request $request ,$baivietchitiet_id){
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
 
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
    $sanpham = DB::table('sanphams')->orderby('idsanpham')->get();
    // $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
   
    $baivietchitiet = baivietchitiet::with('baiviet')->where('baivietcon_id',$baivietchitiet_id)->take(1)->get();
    $baiviet =DB::table('baiviets')->orderby('baiviet_id')->get(); 
    foreach( $baivietchitiet as $key => $cate)
    {
       
        $meta_title = $cate->baivietcon_name;
      $cate_id =$cate->baiviet_id; 
        $url_canonical = $request->url();
    }
   
    $baivietlienquan = baivietchitiet::with('baiviet')->where('baiviet_id',$cate_id)->whereNotIn('baivietcon_id',[$baivietchitiet_id])->take(1)->get();
    
        return view('layout.baivietchitiet')->with('baivietchitiet',$baivietchitiet)->with('baivietlienquan',$baivietlienquan)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('slider',$slider)->with('baiviet',$baiviet)->with('meta_title',$meta_title);
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
     * @param  \App\Models\baiviet  $baiviet
     * @return \Illuminate\Http\Response
     */
    public function show(baiviet $baiviet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\baiviet  $baiviet
     * @return \Illuminate\Http\Response
     */
    public function edit(baiviet $baiviet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\baiviet  $baiviet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, baiviet $baiviet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\baiviet  $baiviet
     * @return \Illuminate\Http\Response
     */
    public function destroy(baiviet $baiviet)
    {
        //
    }
}
