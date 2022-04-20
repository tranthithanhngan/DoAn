<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhangchitiet extends Model
{
	use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'idsanpham', 'tensanpham','giasanpham','product_sales_quantity','order_id','product_coupon','product_feeship'
        
    ];
    protected $primaryKey = 'order_details_id';
 	protected $table = 'chitietdonhangs';

 	public function sanpham(){
 		return $this->belongsTo('App\Models\SP','idsanpham');
 	}
}
