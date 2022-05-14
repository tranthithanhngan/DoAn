<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lienhe extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'info-contact','info_map','info_image'
    ];
    protected $primaryKey = 'info_id';
 	protected $table = 'lienhes';

     
}
