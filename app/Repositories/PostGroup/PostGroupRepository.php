<?php

namespace App\Repositories\PostGroup;

use App\Model\PostGroup;
use App\Model\Post;
use App\Repositories\PostGroup\PostGroupRepositoryInterface;
use App\Repositories\BaseRepository;

class PostGroupRepository extends BaseRepository implements PostGroupRepositoryInterface {
    public function __construct(PostGroup $model)
    {
        parent::__construct($model);
    }
    public function getPost($id_postGroup){
        $data_post = [];
        $post_group = PostGroup::findOrFail($id_postGroup);
        $post =  $post_group->posts;
        foreach($post as $item){
            $data = Post::findOrFail($item->id);
            array_push($data_post, ['tags' => $data->tags,'post' => $item]);
            
        }
        return $data_post;
    }
}