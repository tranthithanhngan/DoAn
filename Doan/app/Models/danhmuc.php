<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'tendanhmuc'
    ];
    protected $primarykey='id';
    protected $table='danhmucs';
    public function sanpham(){
        return $this ->hasMany('App\Models\SP');
    }

}