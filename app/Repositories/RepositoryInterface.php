<?php

namespace App\Repositories;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 *
 * @package Framgia\Gmt\Repositories
 */
interface RepositoryInterface
{
    public function all();

    public function find($id);
    public function delete($id);
    public function show();
    public function update(Model $model, $attribute = []);
    public function whereEqualCondition($condition1,$condition2);
}