<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SocialCustomers extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'provider_user_id',
        'provider_user_email',
        'provider',
       'user',
    ];
    protected $primaryKey = 'user_id';
 	protected $table = 'dangnhaps';

     public function nguoidung(){
         return $this->belongsTo('App\Models\nguoidung','user');
     }

} 
