<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('post_images')->orderBy('created_at','desc')->get();
//        return view('welcome', compact('posts'));
        return response()->json($posts);

    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'country' => 'required',
            'city' => 'required'
        ]);

//        $post = new Post();
//        $post->title = $request->get('title');
//        $post->subtitle = $request->get('subtitle');
//        $post->body = $request->get('body');
//        $post->country = $request->get('country');
//        $post->city = $request->get('city');
//        $post->save();

//        $post = Post::create([
//            'title' => $request->title,
//            'subtitle' => $request->subtitle,
//            'body' => $request->body,
//            'country' => $request->country,
//            'city' => $request->city,
//        ]);

//        $images = $request->images;
//
//        if($request->images != null) {
//            foreach($images as $image) {
//                $imagePath = Storage::disk('uploads')->put('posts/' . $post->id, $image);
//                PostImage::create([
//                    'post_image_path' => '/uploads/' . $imagePath,
//                    'post_id' => $post->id
//                ]);
//            }
//        }


        $post = new Post();
        $post->fill($request->all());

        //image upload

        if ($image = $request->file('image')) {

            $name = Str::random(16) . '.' . $image->getClientOriginalExtension();
            $image->storePubliclyAs('public/images/recipe_images', $name);
            $post->image_path = $name;
        }

        $post->save();


        return response()->json($post);
    }
}
