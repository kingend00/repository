<?php

namespace App\Repositories\PostTag;

use App\Model\PostTag;
use App\Repositories\PostTag\PostTagRepositoryInterface;
use App\Repositories\BaseRepository;

class PostTagRepository extends BaseRepository implements PostTagRepositoryInterface {
    public function __construct(PostTag $model)
    {
        parent::__construct($model);
    }
}