<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class doanhthu extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'ngaydat', 'doanhso','loinhuan','sldaban','sodonhang','giagoc'
    ];
    protected $primaryKey = 'doanhthu_id';
 	protected $table = 'doanhthus';

} 
