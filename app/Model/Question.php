<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    public function user()
    {
    	return $this->belongsTo(App\Model\User::class);
    }
    
    public function replies()
    {
    	return $this->hasMany(App\Model\Reply::class);
    }

    public function category()
    {
    	return $this->belongsTo(App\Model\Category::class);
    }
}
