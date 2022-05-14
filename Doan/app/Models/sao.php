<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sao extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'idsanpham','sao'
    ];
    protected $primaryKey = 'sao_id';
 	protected $table = 'saos';

     
}
