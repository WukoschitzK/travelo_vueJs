<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'country' => 'required',
            'city' => 'required',
            'image_path' => 'nullable|mimes:jpeg,png'
        ]);

        $post = new Post();
        $post->fill($request->all());

        //image upload

        if ($image = $request->file('image_path')) {

            $name = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $path = Storage::disk("s3")->putFileAs(config("app.name") . "/images/post_images", $image, $name);
            //$image->storePubliclyAs('public/images/post_images', $name);
            $post->image_path = $path;
        }

        $post->save();


        return response()->json($post);
    }
}
