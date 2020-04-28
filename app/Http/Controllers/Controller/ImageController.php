<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\Post;
use Illuminate\Http\Request;
use File;

class ImageController extends Controller
{
    public function store(Request $request){
        if($request->get('image'))
        {
           $image = $request->get('image');
           $path = public_path('images/');
           if (! File::exists(public_path('images/'))) {
                File::makeDirectory(public_path('images/'));
            }
           File::makeDirectory($path, $mode = 0777, true, true);
           $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
           \Image::make($request->get('image'))->save($path.$name);
         }
        // $post_data = Post::findOrFail('1');
        $image= new Image();
        $image->post_id = 1;
        $image->image_name = $name;
        $image->save();
 
        return response()->json(['success' => 'You have successfully uploaded an image'], 200); 
    }
}
