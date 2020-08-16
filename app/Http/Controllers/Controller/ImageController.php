<?php

namespace App\Http\Controllers\Controller;

use App\Http\Controllers\Controller;
use App\Model\Image;
use App\Model\ImageProvisional;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        // $this->validate($request, ['image' => 'required|image']);
        // dd($request->hasfile('image'));
        // foreach($request->image as $item)
        // {
        //     dd($request->hasFile($item));
        // }
        if ($request->hasfile('image')) {
            foreach ($request->image as $item) {
                $file = $item;
                $name=time().str_replace(' ', '-', $file->getClientOriginalName());
                $filePath = 'images/' . $name;
                Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');
    
                $path = public_path('images/');
                if (!File::exists($path)) {
                    File::makeDirectory($path);
                }
                File::makeDirectory($path, $mode = 0777, true, true);
                \Image::make($item)->save($filePath);
                $image= new Image();
                $image->post_id = 1;
                $image->image_path = $filePath;
                $image->save();
            }
            return response()->json(['success' => 'You have successfully uploaded an image'], 200);
        }
         return response()->json(['error' => 'has no file to upload'], 422);
    }

    public function destroy(Image $image)
    {
        $path = $image->image_path;
        $image->delete();
        Storage::disk('s3')->delete($image->path);
        return back()->with('success', 'Image has been delete');
    }
    public function saveImageProvisional(Request $request)
    {
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name=time().str_replace(' ', '-', $file->getClientOriginalName());
            $filePath = 'images/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

            $image= new ImageProvisional();
            $image->post_id = Post::max('id')+1;
            $image->image_path = $filePath;
            $image->save();
            return response()->json(['file_path' => $filePath], 200);
        }
         return response()->json(['error' => 'has no file to upload'], 422);
    }
}
