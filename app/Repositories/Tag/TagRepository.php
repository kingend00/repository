<?php

namespace App\Repositories\Tag;

use App\Model\Tag;
use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
    public function getPost()
    {
        $tags = Tag::all();
        $data = [];
        foreach ($tags as $item) {
            array_push($data, ['tag' =>$item, 'posts'=> $item->posts]);
        }
                
        return $data;
    }
    public function getPostTag($tagId)
    {
        $data = [];
        $tag = Tag::findOrFail($tagId);
        foreach ($tag->posts as $item) {
            array_push($data, ['post'=> $item,'post_group' => $item->postable]);
        }
        return $data;
    }
}
