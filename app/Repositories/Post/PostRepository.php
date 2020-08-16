<?php

namespace App\Repositories\Post;

use App\Model\Post;
use App\Model\PostGroup;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }
    public function getTag($postId)
    {
        $post = Post::findOrFail($postId);
        return $post->tags;
    }
    public function getPostGroup()
    {
        $post = Post::all();
        $data = [];
        foreach ($post as $item) {
            array_push($data, ['post' =>$item, 'post_group'=> $item->postable]);
        }
                
        return $data;
    }
}
