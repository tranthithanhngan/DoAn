<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class binhluan extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'binhluan', 'binhluan_chitiet','idsanpham','binhluan_name','binhluan_status','binhluan_traloi'
    ];
    protected $primaryKey = 'binhluan_id';
 	protected $table = 'binhluans';
public function sanpham(){
    return $this->belongsTo('App\Models\sanpham','idsanpham');
} 
}