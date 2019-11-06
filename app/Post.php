<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    protected $fillable =['title', 'content', 'slug', 'publish_date'];

    public function user(){
      return $this->belongsTo('App\User','id','user_id');
    }

    public function createSlug ($title, $id){
        $slug =  Str::slug($title, '-');

        $findSlugs = $this->findRelatedSlugs ($slug, $id);

        if (! $findSlugs->contains('slug', $slug)){
            return $slug;
        }

        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $findSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

    }

    protected function findRelatedSlugs($slug, $id = 0)
    {
        return $this->select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }


}
