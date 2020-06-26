<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

use App\Model\Like;
use App\Model\Question;

class Reply extends Model
{
    protected $guarded= [];

   // protected $fillable = ['body','question_id','user_id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function($reply){
            if(auth()->check()) {
                $reply->user_id = auth()->id();
            }
        });
    }
    
    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function likes()
    {
    	return $this->hasMany(Like::class);
    }

    
}
