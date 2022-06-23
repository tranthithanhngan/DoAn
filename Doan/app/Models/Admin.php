<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'admin_email','admin_password','admin_name','admin_phone','idroles'
    ];
    protected $primaryKey = 'admin_id';
    protected $table = 'admins';

    public function roles(){
        return $this->belongsToMany('App\Models\roles');
    }
    public function getAuthPassword(){
        return $this->admin_password;
    }
    public function hasAnyRoles($roles){
       
        return null !== $this->roles()->whereIn('name_roles',$roles)->first();
    }
    public function hasRole($role){
        return null !== $this->roles()->where('name_roles',$role)->first();
    }

    
}
