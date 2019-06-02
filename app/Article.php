<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Favorite;

class Article extends Model
{
    //
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
}

