<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    // 多対多
    public function users()
    {
        return $this->belognsToMany('App\User');
    }

    // 1対多
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

}
