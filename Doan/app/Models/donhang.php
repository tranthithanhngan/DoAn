<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'customer_id', 'shipping_id', 'order_status','order_id','created_at'
    ];
    protected $primaryKey = 'order_id';
 	protected $table = 'donhangs';
}
