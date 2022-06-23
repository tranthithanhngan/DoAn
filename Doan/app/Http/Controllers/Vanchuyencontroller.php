<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\Admin;
use App\Models\danhmuc;
use App\Models\mangxahoi;
// use Auth;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Rules\Captcha;
use App\Models\tinhthanhpho;
use App\Models\quanhuyen;
use App\Models\phuongxathitran;
use App\Models\feeship;
class Vanchuyencontroller extends Controller
{
    //
    public function vanchuyen(Request $request){

    	$city = tinhthanhpho::orderby('matp','ASC')->get();

    	return view('admin.themvanchuyen')->with(compact('city'));
    }

    public function select_delivery(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_province = quanhuyen::where('matp',$data['matp'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_province as $key => $province){
    				$output.='<option value="'.$province->maqh.'">'.$province->name.'</option>';
    			}

    		}else{

    			$select_wards = phuongxathitran::where('maqh',$data['matp'])->orderby('xaid','ASC')->get();
    			$output.='<option>---Chọn xã phường---</option>';
    			foreach($select_wards as $key => $ward){
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
    			}
    		}
    		echo $output;
    	}
    	
    }

    public function insert_delivery(Request $request){
		$data = $request->all();
		$fee_ship = new Feeship();
		$fee_ship->fee_matp = $data['city'];
		$fee_ship->fee_maqh = $data['province'];
		$fee_ship->fee_xaid = $data['wards'];
		$fee_ship->fee_feeship = $data['fee_ship'];
		$fee_ship->save();
	}

    public function select_feeship(){
		$feeship = feeship::orderby('fee_id','DESC')->get();
		$output = '';
		$output .= '<div class="table-responsive">  
			<table class="table table-bordered">
				<thread> 
					<tr>
						<th>Tên thành phố</th>
						<th>Tên quận huyện</th> 
						<th>Tên xã phường</th>
						<th>Phí ship</th>
					</tr>  
				</thread>
				<tbody>
				';

				foreach($feeship as $key => $fee){

				$output.='
					<tr>
						<td>'.$fee->city->name.'</td>
						<td>'.$fee->province->name.'</td>
						<td>'.$fee->wards->name.'</td>
						<td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
					</tr>
					';
				}

				$output.='		
				</tbody>
				</table></div>
				';

				echo $output;

		
	}

	public function update_delivery(Request $request){
		$data = $request->all();
		$fee_ship = feeship::find($data['feeship_id']);
		$fee_value = rtrim($data['fee_value'],'.');
		$fee_ship->fee_feeship = $fee_value;
		$fee_ship->save();
	}
	public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = quanhuyen::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name.'</option>';
                }

            }else{

                $select_wards = phuongxathitran::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                }
            }
            echo $output;
        }
    }

	public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
           
			if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                     foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{ 
                    Session::put('fee',25000);
                    Session::save();
                }
            }
          
        }
    }
	public function del_fee(){
        Session::forget('fee');
        return redirect()->back();
    }
}
