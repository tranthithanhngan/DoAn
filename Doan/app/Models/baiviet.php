<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baiviet extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'baiviet_name', 'baiviet_status'
    ];
    protected $primaryKey = 'baiviet_id';
 	protected $table = 'baiviets';
}
