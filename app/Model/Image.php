<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = 'images';

    public function posts(){
        return $this->belongsTo('App\Model\Post');
    }
}
