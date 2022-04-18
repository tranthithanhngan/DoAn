<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoidungs extends Model
{
    use HasFactory;
    protected  $table ='nguoidungs';
    protected $fillable = [
        'customer_name','customer_email','customer_password','customer_phone'
    ];
    protected $primaryKey = 'customer_id';

}
