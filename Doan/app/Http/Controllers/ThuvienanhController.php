<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use App\Models\thuvienanh;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class ThuvienanhController extends Controller
{
    //
    public function AuthLogin(){
        
      // $admin_id =  Session::get('admin_id');
      $admin_id =  Auth::id();
      if($admin_id){
        
          return Redirect::to('dashboard');
      }else{
        
          return Redirect::to('login')->send();
      }
  }
    public function themanh($idsanpham){
        $idsp =$idsanpham;
  
        return view('admin.themanh')->with(compact('idsp'));
    }
    public function update_hinhanh(Request $request){
       $ha_id = $request->thuvienanh_id;
       $ha_text = $request->thuvienanh_text;
       $hinhanh =thuvienanh::find($ha_id);
       $hinhanh->thuvienanh_name=  $ha_text;
     
       $hinhanh->save();
    }
    public function capnhat_hinhanh(Request $request){
       $get_image= $request->file('file');
       $ha_id= $request->thuvienanh_id;
       if($get_image)
       {
         
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('image/',$new_image);

          $hinhanh = thuvienanh::find($ha_id);
          unlink('image/'.$hinhanh->hinhanh);
          $hinhanh->hinhanh= $new_image;
         
          $hinhanh->save();
         
       } 

     }
    public function delete_hinhanh(Request $request){
        $ha_id = $request->thuvienanh_id;
       
        $hinhanh =thuvienanh::find($ha_id);
       unlink('image/'.$hinhanh->hinhanh);
      $hinhanh->delete();
      
     }
    public function insert_hinhanh(Request $request,$hinhanh_id){
       $get_image = $request->file('file');
       if($get_image)
       {
           foreach($get_image as $image){
            $get_name_image = $image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image->move('image/',$new_image);
          $hinhanh = new thuvienanh();
          $hinhanh->thuvienanh_name= $new_image;
          $hinhanh->hinhanh= $new_image;
          $hinhanh->idsanpham=$hinhanh_id;
          $hinhanh->save();
           }
       } 
       Session::put('message','Thêm ảnh thành công');
       return redirect()->back();
       
    }
    public function select_hinhanh(Request $request){
        $idsanpham = $request->idsp;
        $hinhanh= thuvienanh::where('idsanpham',$idsanpham)->get();
     
        $hinhanh_count =$hinhanh->count();
        
        $output = '
        <form>
                '.csrf_field().'
        <table class="table table-hover">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên hình ảnh</th>
            <th>Hình ảnh</th>
            <th>Quản lí</th>
          </tr>

        </thead>
        <tbody>
        ';
       
        if($hinhanh_count>0 ){
            $i=0;
           
            foreach($hinhanh as $key =>$ha){
                $i++;
                $output.='
               
                <tr>
                <td>'.$i.'</td>
                <td contenteditable class="edit_ha_name" data-ha_id ="'.$ha->thuvienanh_id.'" >'.$ha->thuvienanh_name.'</td>
                <td>
                
                
                <img src ="'.url('image/'.$ha->hinhanh).'" class ="img.thumbnall" width = "120px" height="120px"> 
                <input type="file" class="file_image" style="width:40%" data-ha_id="'.$ha->thuvienanh_id.'" id="file-'.$ha->thuvienanh_id.'" name="file" accept="image/*" />
                
                </td>
                <td><button type="button" data-ha_id="'.$ha->thuvienanh_id.'" class= "btn btn-xs btn-danger delete-hinhanh">Xóa</button>  </td>
              </tr>
                ';
              
            }
            
        }
        else{
            $output.='
            <tr>
            <td colspan="4">Sản phẩm này chưa có thư viện ảnh</td>
            
          </tr>

            ';

        }
        $output .= '
        
        </tbody>
        </table>
        </form>';
        echo $output;

        
    }
}
