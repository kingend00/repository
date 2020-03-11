<?php

namespace App\Repositories\Tag;

use App\Model\Tag;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryInterface {
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
}