<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class baivietchitiet extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'baivietcon_name', 'hinhbaivietcon','baivietcon_sum','baivietcon_content'
    ];
    protected $primaryKey = 'baivietcon_id';
 	protected $table = 'baivietcons';

     public function baiviet(){
         return $this->belongsTo('App\Models\baiviet','baiviet_id');
     }
}