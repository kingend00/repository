<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostGroup extends Model
{
    protected $table="post_groups";

    protected $fillable = ['title'];

    public function posts(){
        return $this->morphMany('App\Model\Post','postable');
    }
}
