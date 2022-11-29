<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';


    protected $fillable = [
        'name', 'email', 'password', 'rol_usr', 'omatricula','ofolio','oban_fin'
    ];

    
    public function users() {
        return $this->belongsTo(Users::class);
    }

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


    public function adminlte_image()
    {
        return '/img/user.png';
    }

    public function adminlte_desc()
    {
        return 'Bienvenido';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }
}
