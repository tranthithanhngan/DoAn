<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesAdmin extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_id','roles_id'
    ];
    protected $primaryKey = 'id_admin_roles';
 	protected $table = 'adminroles';
   
    
     
}
