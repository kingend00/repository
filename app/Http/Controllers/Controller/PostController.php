<?php

namespace App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Tag;
use App\Model\PostGroup;
use App\Repositories\Post\PostRepository;
use App\Repositories\Tag\TagRepository;
use DB;

class PostController extends Controller
{
    protected $postRepository;
    protected $tagRepository;

    public function __construct(PostRepository $postRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->postRepository->all();
    }
    
    public function getPostGroup()
    {
        return $this->postRepository->getPostGroup();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->get('content');
        // return $request->all();
        $dataPost = $this->postRepository->storeArray([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'slug' => $request->get('slug'),
            'content' => $request->get('content')
        ]);
        $postGroup = PostGroup::findOrFail($request->get('post_group'));
        $postGroup->posts()->save($dataPost);
        foreach($request->get('tag') as $item){
            $checkTagExists = Tag::where('tag',$item)->first();
            if(!$checkTagExists)
                $checkTagExists = $this->tagRepository->storeArray(['tag' => $item]);

            $checkTagExists->posts()->save($dataPost);            
        }
        return "success";
    }
    public function getTag($postId)
    {
        return $this->postRepository->getTag($postId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->postRepository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
