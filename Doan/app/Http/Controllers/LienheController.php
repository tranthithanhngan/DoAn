<?php

namespace App\Http\Controllers;
use Session;
use DB;
use App\Models\lienhe;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LienheController extends Controller
{
    //
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }

    public function lienhe(Request $request){
        $baiviet = DB::table('baiviets')->orderby('baiviet_id')->get(); 
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $meta_desc = "Liên hệ"; 
        $meta_keywords = "Liên hệ";
        $meta_title = "Liên hệ với chúng tôi";
        $url_canonical = $request->url();

        $danhmuc = DB::table('danhmucs')->orderby('id')->get(); 
       $lienhe=lienhe::where('info_id',1)->get();
        $thuonghieu = DB::table('thuonghieus')->orderby('idthuonghieu')->get(); 
        $sanpham = DB::table('sanphams')
        ->join('danhmucs','danhmucs.id','=','sanphams.iddanhmuc')
        ->join('thuonghieus','thuonghieus.idthuonghieu','=','sanphams.idthuonghieu')
        ->orderby('sanphams.idsanpham')->paginate(9);
        
        return view('layout.lienhe')->with('lienhe',$lienhe)->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('baiviet',$baiviet);
   
    }
    public function tranglienhe(){
        $lienhe= lienhe::where('info_id',1)->get();
        return view('admin.lienhe')->with(compact('lienhe'));
    }
    public function luulienhe(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['info_contact'] = $request->info_contact;
        $data['info_map'] = $request->info_map;
     
        $data['info_fanpage'] = $request->info_fanpage;
       
       $get_image = $request->file('info_image');
       if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
                   $name_image = current(explode('.',$get_name_image));
                   $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                   $get_image->move('image/',$new_image);
                   $data['info_image'] = $new_image;
                   DB::table('lienhes')->insert($data);
                   Session::put('message','Thêm liên hệ thành công');
                   return Redirect::to('tranglienhe');
       }
       
       $data['info_image'] = '';
       DB::table('lienhes')->insert($data);
       Session::put('message','Thêm liên hệ thành công');
       return Redirect::to('tranglienhe');
    }
    public function capnhatlienhe(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['info_contact'] = $request->info_contact;
        $data['info_map'] = $request->info_map;
     
        $data['info_fanpage'] = $request->info_fanpage;
       
       $get_image = $request->file('info_image');
       if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
                   $name_image = current(explode('.',$get_name_image));
                   $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                   $get_image->move('image/',$new_image);
                   $data['info_image'] = $new_image;
                   DB::table('lienhes')->where('info_id',1)->update($data);
                   Session::put('message','Cập nhật liên hệ thành công');
                   return Redirect::to('tranglienhe');
       }
       
       DB::table('lienhes')->where('info_id',1)->update($data);
       Session::put('message','Cập nhật liên hệ thành công');
       return Redirect::to('tranglienhe');
    }
}


