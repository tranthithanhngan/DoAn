<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Models\sanpham;
use App\Models\Slider;
use App\Models\binhluan;
use App\Models\thuvienanh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class SanphamController extends Controller
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
    public function themsanpham(){
        $this->AuthLogin();
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
        return view('admin.sanpham')->with('danhmuc', $danhmuc)->with('thuonghieu',$thuonghieu);
    	

    }
    public function luusanpham(Request $request){
        $this->AuthLogin();
       $data = array();
       $data['tensanpham'] = $request->tensanpham;
       $data['slsanpham'] = $request->slsanpham;
    
       $data['giasanpham'] = $request->giasanpham;
       $data['motasanpham'] = $request->motasanpham;
       $data['dotuoi'] = $request->dotuoi;
       $data['size'] = $request->size;
       
       $data['iddanhmuc'] = $request->iddanhmuc;
       $data['idthuonghieu'] = $request->idthuonghieu;
       $data['hinhsanpham'] = $request->hinhsanpham;
       
       $get_image = $request->file('hinhsanpham');
     $path = 'image/';

       if($get_image){
           $get_name_image = $get_image->getClientOriginalName();
           $name_image = current(explode('.',$get_name_image));
           $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
           $get_image->move( $path,$new_image);
           $data['hinhsanpham'] = $new_image;
           DB::table('sanphams')->insert($data);
           Session::put('message','Thêm sản phẩm thành công');
           return Redirect::to('themsanpham');
       }
       $data['hinhsanpham'] = '';
       DB::table('sanphams')->insert($data);
       Session::put('message','Thêm sản phẩm thành công');
       return Redirect::to('themsanpham');
   }
   public function showsanpham(){
    $this->AuthLogin();
    $showsanpham = DB::table('sanphams')
    ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
   
    ->orderby('sanphams.idsanpham')->get();
    $manager_product  = view('admin.lietkesanpham')->with('showsanpham',$showsanpham);
    return view('admin.danhmuc')->with('admin.lietkesanpham', $manager_product);

}
public function suasanpham($idsanpham){
    $this->AuthLogin();
   $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
   $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 

   $suasanpham = DB::table('sanphams')->where('idsanpham',$idsanpham)->get();

   $manager_product  = view('admin.suasanpham')->with('suasanpham',$suasanpham)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu);

   return view('admin.danhmuc')->with('admin.suasanpham', $manager_product);
}
public function capnhatsanpham(Request $request,$idsanpham){
    $this->AuthLogin();
    $data = array();
    $data['tensanpham'] = $request->tensanpham;
    $data['slsanpham'] = $request->slsanpham;
    $data['dotuoi'] = $request->dotuoi;
    $data['size'] = $request->size;
    $data['giasanpham'] = $request->giasanpham;
    $data['motasanpham'] = $request->motasanpham;
    $data['idthuonghieu'] = $request->idthuonghieu;
    $data['iddanhmuc'] = $request->iddanhmuc;
   
    $data['hinhsanpham'] = $request->hinhsanpham;
    
    $get_image = $request->file('hinhsanpham');
   if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
               $name_image = current(explode('.',$get_name_image));
               $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('image',$new_image);
               $data['hinhsanpham'] = $new_image;
               DB::table('sanphams')->where('idsanpham',$idsanpham)->update($data);
               Session::put('message','Cập nhật sản phẩm thành công');
               return Redirect::to('showsanpham');
   }
       
   DB::table('sanphams')->where('idsanpham',$idsanpham)->update($data);
   Session::put('message','Cập nhật sản phẩm thành công');
   return Redirect::to('showsanpham');
}
public function xoasanpham($idsanpham){
    $this->AuthLogin();
    DB::table('sanphams')->where('idsanpham',$idsanpham)->delete();
    Session::put('message','Xóa sản phẩm thành công');
    return Redirect::to('showsanpham');
}

public function chitietsanpham($idsp , Request $request){
    //slide
   $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
   $baivietpost = DB::table('baiviets')->orderBy('baiviet_id')->get(); 

  
$meta_desc = "Chuyên bán những đồ dùng cho mẹ và trẻ em"; 
$meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
$meta_title = "Chi tiết sản phẩm";
$url_canonical = $request->url();
   $danhmuc = DB::table('danhmucs')->orderBy('id')->get(); 
   $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 

   $chitietsp = DB::table('sanphams')
   ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
   ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
   ->where('sanphams.idsanpham',$idsp)->get();

   foreach($chitietsp as $key => $value){
       $category_id = $value->id;
       $idsanpham=$value->idsanpham;
       $sp_cate=$value->tendanhmuc;
       $iddanhmuc_cate=$value->iddanhmuc;
       $idthuonghieu_cate=$value->idthuonghieu;
       $th_cate=$value->tenthuonghieu;
       $tensp_cate=$value->tensanpham;
           //seo 
        //    $meta_desc = $value->product_desc;
        //    $meta_keywords = $value->product_slug;
        //    $meta_title = $value->product_name;
        //    $url_canonical = $request->url();
           //--seo
       }
       $hinhanhpost = thuvienanh::where('idsanpham',$idsanpham)->get(); 

   $related_sp = DB::table('sanphams')
   ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
   ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
   ->where('danhmucs.id', $category_id)->whereNotIn('sanphams.idsanpham',[$idsp])->paginate(3);


   return view('layout.showchitietsp')->with('baivietpost',$baivietpost)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('chitietsp',$chitietsp)->with('relate_sp',$related_sp)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('hinhanhpost',$hinhanhpost)->with('sp_cate',$sp_cate)->with('th_cate',$th_cate)->with('tensp_cate',$tensp_cate)->with('iddanhmuc_cate',$iddanhmuc_cate)->with('idthuonghieu_cate', $idthuonghieu_cate);

}
public function showbinhluan(Request $request){
$binhluan=binhluan::with('sanpham')->orderBy('binhluan_status','DESC')->get();

return view('admin.binhluan')->with(compact('binhluan'));
}  
public function traloi_comment(Request $request){
    $data=$request->all();
   $binhluan=new binhluan();
   $binhluan->binhluan=$data['binhluan'];
   $binhluan->idsanpham=$data['idsanpham'];
   $binhluan->binhluan_traloi=$data['binhluan_id'];
   $binhluan->binhluan_status=0;
   $binhluan->binhluan_name='Admin';
   $binhluan->save();
    
   
    }  
    
public function duyet_comment(Request $request){
   $data=$request->all();
   $binhluan=binhluan::find($data['binhluan_id']);
   $binhluan->binhluan_status=$data['binhluan_status'];
 
   $binhluan->save();
    
   
    } 
public function send_comment(Request $request){
    $idsanpham= $request->idsp;
    $comment_name= $request->comment_name;
    $comment_content= $request->comment_content;
    $binhluan= new binhluan();
    $binhluan->binhluan=$comment_content;
    $binhluan->binhluan_name=$comment_name;
    $binhluan->idsanpham=$idsanpham;
    $binhluan->binhluan_status=1;
    $binhluan->save();

}
public function load_commnet(Request $request){
  $idsanpham= $request->idsp;
  $binhluan= binhluan::where('idsanpham',$idsanpham)->where('binhluan_status',0)->get();
  $output ='';

    foreach($binhluan as $key=>$comm){
       $output.= '
       	<div class="row style_comment">
        <div class="col-md-2">
        <img width="100%" class="img img-responsive img-thumbnail">
        </div>
        <div class="col-md-10">
        <p style="color: green;">@'.$comm->binhluan_name.'</p>
        <p>'.$comm->binhluan.'</p>

        </div>

    </div><p></p>
    ';
    }
    
    return $output;
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
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show(sanpham $sanpham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit(sanpham $sanpham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sanpham $sanpham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy(sanpham $sanpham)
    {
        //
    }
}
