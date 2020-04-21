<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;

interface UserRepositoryInterface {
    
    public function login(Request $request);
}