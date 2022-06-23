<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quanhuyen extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name', 'type', 'matp'
    ];
    protected $primaryKey = 'maqh';
 	protected $table = 'quanhuyens';
}
