<?php

namespace App\Repositories\PostGroup;

use App\Model\PostGroup;
use App\Repositories\PostGroup\PostGroupRepositoryInterface;
use App\Repositories\BaseRepository;

class PostGroupRepository extends BaseRepository implements PostGroupRepositoryInterface {
    public function __construct(PostGroup $model)
    {
        parent::__construct($model);
    }
    public function getPost($id_postGroup){
        $post_group = PostGroup::findOrFail($id_postGroup);
        return $post_group->posts;
    }
}