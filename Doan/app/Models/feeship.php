<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeship extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'fee_matp', 'fee_maqh','fee_xaid','fee_feeship'
    ];
    protected $primaryKey = 'fee_id';
 	protected $table = 'feeship';

 	public function city(){
 		return $this->belongsTo('App\Models\tinhthanhpho', 'fee_matp');
 	}
 	public function province(){
 		return $this->belongsTo('App\Models\quanhuyen', 'fee_maqh');
 	}
 	public function wards(){
 		return $this->belongsTo('App\Models\phuongxathitran', 'fee_xaid');
 	}
}
