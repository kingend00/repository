<?php

namespace App\Repositories\Tag;

interface TagRepositoryInterface {
    public function getPost();
    public function getPostTag($tagId);
}