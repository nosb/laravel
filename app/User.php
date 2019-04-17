<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
/*use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;*/
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{



    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'id';
    }

/*    public function ssss()
    {
        return $this->hasMany('App\Posts','uid','id');
    }


    public function test(){
        return 1;
    }*/

}

/*class User extends Authenticatable implements JWTSubject
{
    use Notifiable;



    protected $guarded = [];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }




    public function getRouteKeyName()
    {
        return 'id';
    }


    //一对多
    public function Posts()
    {
        return $this->hasMany('App\Posts','uid');
    }


    public function getEmailAttribute($value)
    {

        return ucfirst($value);
    }



    public function getNameAttribute($value)
    {

        return strtolower($value);
    }


}*/