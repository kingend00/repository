<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class BaseRepository implements RepositoryInterface 
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(){
        return $this->model->all();
    }

    public function find($id){
        return $this->model->findOrFail($id);
    }
    public function delete($id){
        return $this->model->delete($id);
    }
    public function update(Model $model, $attribute = []){

    }
    public function whereEqualCondition($condition1 , $condition2){
        return $this->model->where($condition1,'=',$condition2)->get();
    }
    public function show() {
        return 1;
    }
    public function store(Request $request){
        return $this->model->create($request);
    }
    public function create(){
        return "this is function create";
    }
}