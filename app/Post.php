<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'content', 'title', 'image', 'tag'
    ];

    public function user(){
      return $this->belongsTo(\App\User::class,'user_id');
    }
      //postのは複数のコメントが来るため
    public function comments(){
      return $this->hasMany(\App\Comment::class,'post_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function likes()
    {
        return $this->hasMany('App\Like', 'post_id', 'id');
    }
    public static function defaultLiked($post, $user_auth_id)
    {
      $defaultLiked = 0;
      foreach ($post['likes'] as $key => $like) {
          if($like['user_id'] == $user_auth_id) {
            $defaultLiked = 1;
            break;
          }
      }
    }
}
