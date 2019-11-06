<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable =['title', 'content', 'slug', 'publish_date'];

    public function user(){
      return $this->belongsTo('App\User','id','user_id');
    }
}
