<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\DeviceToken;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use Notifiable,Sluggable,HasApiTokens;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','group', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
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

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function token()
    {
        return $this->hasMany('App\Models\DeviceToken');
    }

    public function getNameAttribute($name){
        return ucwords($name);
    }


    public function isadmin() {
        if($this->group == 'administrator'){
            return true;
        }
        return false;
    }
}
