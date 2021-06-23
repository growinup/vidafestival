<?php

namespace App;

use App\Area;
use App\Department;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
    
    use HasRolesAndPermissions,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token','dep','department_id','authleveltwo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department() {        
        return $this->belongsTo(Department::class);
    }

    // relaciones

    // areas en las que puede autorizar un usuario en el caso de que sea autorizador
    public function areas() {        
        return $this->belongsToMany(Area::class);
    }
   
}