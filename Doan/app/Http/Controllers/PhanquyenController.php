<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\roles;
use DB;
class PhanquyenController extends Controller
{
    //
    public function lietkeusers()
    { 
      
        $admin = DB::table('adminroles')
   ->join('admins','admins.admin_id','=','adminroles.name_id')
   ->join('phanquyens','phanquyens.id_roles','=','adminroles.roles_id')
   ->select('adminroles.*','admins.*','phanquyens.*')->orderby('adminroles.name_id','desc')->get();
       
        return view('admin.lietkeusers')->with(compact('admin'));
    }
    public function logindangki(Request $request){
        return view('admin.dangki');
    }
    public function assign_roles(Request $request){
        $data = $request->all();
        $user = Admin::where('admin_email',$data['admin_email'])->first();
        $user->roles()->detach();
        if($request['author_role']){
           $user->roles()->attach(Roles::where('name','author')->first());     
        }
        if($request['user_role']){
           $user->roles()->attach(Roles::where('name','user')->first());     
        }
        if($request['admin_role']){
           $user->roles()->attach(Roles::where('name','admin')->first());     
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
