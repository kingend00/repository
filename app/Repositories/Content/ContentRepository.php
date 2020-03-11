<?php

namespace App\Repositories\Content;

use App\Model\Content;
use App\Repositories\BaseRepository;
use App\Repositories\Content\ContentRepositoryInterface;

class ContentRepository extends BaseRepository implements ContentRepositoryInterface{
    
    public function __construct(Content $model)
    {
        parent::__construct($model);
    }
}