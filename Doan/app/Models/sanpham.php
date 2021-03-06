<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'tensanpham','iddanhmuc','idthuonghieu','giasanpham','hinhsanpham','motasanpham','size','dotuoi','slsanpham'
    ];
    protected $primaryKey = 'idsanpham';
 	protected $table = 'sanphams';

     public function binhluan(){
        return $this->hasMany('App\Models\binhluan');
    }
}
