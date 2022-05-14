<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_roles'
    ];
    protected $primaryKey = 'id_roles';
 	protected $table = 'phanquyens';
     public function admin(){
        return $this->belongsToMany('App\Models\Admin');
    }
     
}
