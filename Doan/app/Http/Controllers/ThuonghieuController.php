<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Models\thuonghieu;
use App\Models\SP;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class ThuonghieuController extends Controller
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
    public function themthuonghieu(){
        $this->AuthLogin();
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        
        return view('admin.thuonghieu')->with('danhmuc', $danhmuc);
    	

    }
    public function luuthuonghieu(Request $request){
        $this->AuthLogin();
       $data = array();
       $data['tenthuonghieu'] = $request->tenthuonghieu;
       $data['iddanhmuc'] = $request->iddanhmuc;
       DB::table('thuonghieus')->insert($data);
       Session::put('message','Thêm thương hiệu thành công');
       return Redirect::to('themthuonghieu'); 
   }
   public function showthuonghieu(){
    $this->AuthLogin();
    $showthuonghieu = DB::table('thuonghieus')
    ->join('danhmucs','danhmucs.id','=','thuonghieus.iddanhmuc')
   
    ->orderby('thuonghieus.idthuonghieu')->get();
    $manager_product  = view('admin.lietkethuonghieu')->with('showthuonghieu',$showthuonghieu);
    return view('admin.danhmuc')->with('admin.lietkethuonghieu', $manager_product);

}
public function suathuonghieu($idthuonghieu){
    $this->AuthLogin();
   $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
  
   $suathuonghieu = DB::table('thuonghieus')->where('idthuonghieu',$idthuonghieu)->get();

   $manager_product  = view('admin.suathuonghieu')->with('suathuonghieu',$suathuonghieu)->with('danhmuc',$danhmuc);

   return view('admin.danhmuc')->with('admin.suathuonghieu', $manager_product);
}
public function capnhatthuonghieu(Request $request,$idthuonghieu){
    $this->AuthLogin();
    $data = array();
    $data['tenthuonghieu'] = $request->tenthuonghieu;
   
    $data['iddanhmuc'] = $request->iddanhmuc;
   
          
   DB::table('thuonghieus')->where('idthuonghieu',$idthuonghieu)->update($data);
   Session::put('message','Cập nhật thương hiệu thành công');
   return Redirect::to('showthuonghieu');
}
public function xoathuonghieu($idthuonghieu){
    $this->AuthLogin();
    DB::table('thuonghieus')->where('idthuonghieu',$idthuonghieu)->delete();
    Session::put('message','Xóa thương hiệu thành công');
    return Redirect::to('showthuonghieu');
}

public function showsanphamthuonghieu(Request $request, $idthuonghieu){
    //slide
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
    $baivietpost = DB::table('baiviets')->orderby('baiviet_id')->get(); 
    $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
    
    $thuonghieu_by_id = DB::table('sanphams')->join('thuonghieus','sanphams.idthuonghieu','=','thuonghieus.idthuonghieu')->where('thuonghieus.idthuonghieu',$idthuonghieu)->paginate(6);
    // foreach($thuonghieu_by_id as $item)
    // {

    // }
    // dd( $thuonghieu_by_id[0]->iddanhmuc);
    $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
    // dd($thuonghieu);
    $thuonghieu_name = DB::table('thuonghieus')->where('thuonghieus.idthuonghieu',$idthuonghieu)->limit(1)->get();

    $meta_desc = "Chuyên bán những đồ dùng cho mẹ và trẻ em"; 
    $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
    $meta_title = "Thương hiệu";
    $url_canonical = $request->url();
    
    if (isset($_GET['sort_by'])){
        $sort_by=$_GET['sort_by'];
        if($sort_by=='giam_dan'){
            $thuonghieu_by_id= SP::where('idthuonghieu',$idthuonghieu)->orderBy('giasanpham','DESC')->paginate(6)->appends(request()->query());
        }elseif($sort_by=='tang_dan'){
            $thuonghieu_by_id= SP::where('idthuonghieu',$idthuonghieu)->orderBy('giasanpham','ASC')->paginate(6)->appends(request()->query());
        }elseif($sort_by=='kytuza'){
            $thuonghieu_by_id= SP::where('idthuonghieu',$idthuonghieu)->orderBy('tensanpham','DESC')->paginate(6)->appends(request()->query());
        }elseif($sort_by=='kytuaz'){
            $thuonghieu_by_id= SP::where('idthuonghieu',$idthuonghieu)->orderBy('tensanpham','ASC')->paginate(6)->appends(request()->query());
        }

    } 
    else{
        $thuonghieu_by_id= SP::where('idthuonghieu',$idthuonghieu)->orderBy('idsanpham','ASC')->paginate(6);
    }   
        return view('layout.hiensanpham')->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('thuonghieu_by_id',$thuonghieu_by_id)->with('thuonghieu_name',$thuonghieu_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);
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
     * @param  \App\Models\thuonghieu  $thuonghieu
     * @return \Illuminate\Http\Response
     */
    public function show(thuonghieu $thuonghieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\thuonghieu  $thuonghieu
     * @return \Illuminate\Http\Response
     */
    public function edit(thuonghieu $thuonghieu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\thuonghieu  $thuonghieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, thuonghieu $thuonghieu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\thuonghieu  $thuonghieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(thuonghieu $thuonghieu)
    {
        //
    }
}
