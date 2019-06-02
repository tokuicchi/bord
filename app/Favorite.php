<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Article;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $guarded = array('id', 'user_id');

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function articles()
    {
        return $this->belongsTo('App\Article');
    }
}

