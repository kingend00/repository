<?php

namespace App\Repositories\CategoryGroup;

use App\Repositories\CategoryGroup\CategoryGroupRepositoryInterface;
use App\Model\CategoryGroup;
use App\Repositories\BaseRepository;

class CategoryGroupRepository extends BaseRepository implements CategoryGroupRepositoryInterface
{

    // protected $model;

    public function __construct(CategoryGroup $model)
    {
        parent::__construct($model);
    }
    public function show(){
            return 0;
    }

}