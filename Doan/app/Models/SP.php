<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'tensanpham', 'iddanhmuc','idthuonghieu','giasanpham','hinhsanpham','motasanpham','size','dotuoi','slsanpham',
      
    ];
    protected $primaryKey = 'idsanpham';
 	protected $table = 'sanpham';
}
