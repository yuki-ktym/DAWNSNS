<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function users(){
        return $this->hasMany('App/User');
    }

    protected $fillable = ['post', 'user_id'];

    
}
