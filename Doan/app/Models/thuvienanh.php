<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuvienanh extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'thuvienanh_name', 'idsanpham','hinhanh'
    ];
    protected $primaryKey = 'thuvienanh_id';
 	protected $table = 'thuvienanhs';
}
