<?php

namespace App\Repositories\User;

use App\Model\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}