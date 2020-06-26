<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Reply;

class Question extends Model
{
    //protected $fillable = ['title','slug','body','user_id','category_id'];

    protected static function boot()
    {
        parent::boot();
        static::creating( function($question){
            $question->slug = str_slug($question->title);
        });
    }

    //protected $guarded = [];
    protected $fillable = ['title','slug','body','user_id','category_id'];
    protected $with = ['replies'];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function replies()
    {
    	return $this->hasMany(Reply::class)->latest();
    }

    public function category()
    {
    	return $this->belongsTo(App\Model\Category::class);
    }

    public function getPathAttribute()
    {
        return "/question/$this->slug";
    }
}
