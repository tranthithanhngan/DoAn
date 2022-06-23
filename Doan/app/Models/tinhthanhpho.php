<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tinhthanhpho extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name', 'type'
    ];
    protected $primaryKey = 'matp';
 	protected $table = 'tinhthanhphos';
}
