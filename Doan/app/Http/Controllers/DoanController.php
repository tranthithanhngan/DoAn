<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Mail;
use App\Models\Doan;
use App\Models\Slider;
use App\Models\doanhthu;
use App\Models\danhmuc;
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
        ->orderby('sanphams.idsanpham')->paginate(9);
        
        return view('layout.trangchusp')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baiviet',$baiviet);
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
     $sub7days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
     $sub365days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
     $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
     if($data['dashboard_value']=='7ngay'){
        $get=doanhthu::whereBetween('ngaydat',[$sub7days,$now])->orderBy('ngaydat','ASC')->get();
     }
     elseif($data['dashboard_value']=='7ngay'){
        $get=doanhthu::whereBetween('ngaydat',[$sub7days,$now])->orderBy('ngaydat','ASC')->get();
     }
     elseif($data['dashboard_value']=='thangtruoc'){
        $get=doanhthu::whereBetween('ngaydat',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('ngaydat','ASC')->get();
     }
     elseif($data['dashboard_value']=='thangnay'){
        $get=doanhthu::whereBetween('ngaydat',[$dauthangnay,$now])->orderBy('ngaydat','ASC')->get();
     }
     else{
        $get=doanhthu::whereBetween('ngaydat',[$sub365days,$now])->orderBy('ngaydat','ASC')->get();
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
