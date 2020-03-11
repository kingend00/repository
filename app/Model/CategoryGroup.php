<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryGroup extends Model
{
    protected $table="category_group";

    protected $fillable = ['title'];
}
