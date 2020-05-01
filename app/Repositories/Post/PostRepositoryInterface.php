<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface {
    public function getTag($postId);
}