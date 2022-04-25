<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Mail;
use App\Models\Doan;
use App\Models\Slider;
use App\Models\danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class DoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $meta_desc = "Chuyên bán những đồ dùng cho mẹ và trẻ em"; 
        $meta_keywords = "sua cho be,do cho me,khan $ ta,do bau cho me";
        $meta_title = "sữa chính hãng, đảm bảo chất lượng tốt cho mẹ và bé";
        $url_canonical = $request->url();
        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
        $baiviet = DB::table('baiviets')->orderby('baiviet_id')->get(); 
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


       return view('layout.timkiem')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('timkiem_sp',$timkiem_sp)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider);

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
        Mail::send('admin.sendmail',$data,function($message) use ($to_name,$to_email){

            $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
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
