<?php

namespace App\Http\Controllers;
use DB;
use Session;
// use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\Admin;
use App\Models\danhmuc;
use App\Models\mangxahoi;
use Auth;
use App\Models\login;
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
        
        $admin_id =  Session::get('admin_id');
    
        if($admin_id){
          
            return Redirect::to('dashboard');
        }else{
          
            return Redirect::to('login')->send();
        }
    }
    public function login(Request $request)
    {
            return view('admin.loginadmin');
    }
    public function dashboard(Request $request){
      
        // $this->validate($request,[
        //     'admin_email'=>'required|email|max:255',
        //      'admin_password'=>'required|max:255',
        // ]);

        // dd(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password]));
        // if(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password])){
        //     return Redirect::to('/trangadmin');
        // }
        // else {
        //     return Redirect::to('/login')->with('message','Lỗi đăng nhập');
        // }

        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;
        // $admin_status  ='1';
       
        $request = DB::table('admins')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
     
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


    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = mangxahoi::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/trangadmin')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new mangxahois([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''
                    
                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/trangadmin')->with('message', 'Đăng nhập Admin thành công');
        } 
    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
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
