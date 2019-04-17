<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    protected $guarded = [];

    public function posts(){

        return $this->belongsTo('App\Users','uid');
    }



}
