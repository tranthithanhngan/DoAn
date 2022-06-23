<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
class PhanquyenController extends Controller
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
    public function lietkeusers()
    {
        $this->AuthLogin();
        $admin = Admin::with('roles')->orderBy('admin_id','DESC')->paginate(5);   
   $manager_product  = view('admin.lietkeusers')->with('admin',$admin);
   return view('admin.danhmuc')->with('admin.lietkeusers', $manager_product);
       
    }
    public function xoa_roles($admin_id)
    {
        if(Auth::id()==$admin_id)
        {
            return redirect()->back()->with('message','Bạn không được quyền xóa chính mình');
        }
        
            $admin=Admin::find($admin_id);
            if($admin){
                $admin->roles()->detach();
                $admin->delete();
            }
          
            return redirect()->back()->with('message','Xóa user thành công');
    }
    public function logindangki(Request $request){
        return view('admin.dangki');
    }

    public function themusers(){
        $this->AuthLogin();
    	return view('admin.themuser');
    }
    public function chuyen_roles($admin_id){
        $this->AuthLogin();
    $user=Admin::where('admin_id',$admin_id)->first();
    if($user){
        session()->put('chuyen_roles',$user->admin_id);
    }
    return redirect('/user');
    }
   
    public function luuuser(Request $request){
        $this->AuthLogin();
        $data= $request->all();
        $admin=new Admin();
        $admin->admin_name=$data['admin_name'];
        $admin->admin_phone=$data['admin_phone'];
        $admin->admin_email=$data['admin_email'];
        $admin->admin_password=$data['admin_password'];
       
        $admin->roles()->attach(roles::where('name_roles','user')->first());
        $admin->save();
        Session::put('message','Thêm user thành công');
        return Redirect::to('users');
    }
    public function assign_roles(Request $request){
        if(Auth::id()==$request->admin_id)
        {
            return redirect()->back()->with('message','Bạn không được phân quyền chính mình');
        }
        // $data = $request->all();
        $user = Admin::where('admin_email',$data['admin_email'])->first();
        
        $user->roles()->detach();    
        if($request['author_role']){
           $user->roles()->attach(roles::where('name_roles','author')->first());     
        }
        if($request['user_role']){
           $user->roles()->attach(roles::where('name_roles','user')->first());     
        }
        if($request['admin_role']){
           $user->roles()->attach(roles::where('name_roles','admin')->first());     
        }
        return redirect()->back()->with('message','Cấp quyền thành công');
    }
    public function dangki(Request $request){
        $this->validation($request);
        $data=$request->all();

        $admin=new Admin();
        $admin->admin_name=$data['admin_name'];
        $admin->admin_email=$data['admin_email'];
        $admin->admin_phone=$data['admin_phone'];
        $admin->admin_password=$data['admin_password'];
        $admin->save();
        return redirect('/login')->with('message','Đăng kí thành công');
    }

    public function validation(Request $request){
        return $this->validate($request,[
        'admin_name'=>'required|max:255',
        'admin_phone'=>'required|max:255',
        'admin_email'=>'required|email|max:255',
        'admin_password'=>'required|max:255',
        ]);
    }
}
