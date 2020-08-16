<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageProvisional extends Model
{
    //
    protected $table="image_provisional";

    public function posts()
    {
        return $this->belongsTo('App\Model\Post');
    }
}
