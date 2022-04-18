<?php

namespace App\Http\Controllers;
use DB;
use Session;

use App\Models\Admin;
use App\Models\danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha; 
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $name = Admin::first();
      
    //    dd($name);
        return view('admin.danhmuc', compact('name'));
    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function login()
    {
        
            return view('admin.loginadmin');
    }
    public function dashboard(Request $request){
       

        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;
        $admin_name  ='Ngân';
        $request = DB::table('admins')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->where('admin_name',$admin_name)->first();
     
        if($request)
        {
           
                Session::put('admin_name', $request->admin_name);
                Session::put('admin_id',$request->admin_id);
                return Redirect::to('/trangadmin');
            
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Vui lòng nhập lại');
                return Redirect::to('/login');
        }
       

    }
    public function show_dashboard(){
        $this->AuthLogin();
    	return view('admin.dashboard');
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
     * @param  \App\Models\Admin  $admin
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }
    public function logout(){
     
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/login');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
