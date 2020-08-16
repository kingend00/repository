<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";

    protected $fillable = ['title','slug','description','content','postable_id','postable_type'];

    /**
     * Get all of the tags for the post.
     */
    public function tags()
    {
        return $this->morphToMany('App\Model\Tag', 'taggable');
    }
    public function postable()
    {
        return $this->morphTo();
    }
    public function image()
    {
        return $this->hasMany('App\Model\Image', 'post_id');
    }
}
