<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function updateOrCreate()
    {
        Post::updateOrCreate([
            "title" => "titlu_nou"
        ],
            [
                "title" => "updateOrCreate",
                "content" => "updateOrCreate",
                "image" => "updateOrCreate",
                "likes" => 501,
                "is_publisched" => 1,
            ]);
        dump("updateOrCreate");
    }

    public function firstOrCreate()
    {
        $x = Post::firstOrCreate([
            "title" => "titlu_nou_first_or_create"
        ],
            [
                "title" => "titlu_nou_first_or_create",
                "content" => "content_nou1",
                "image" => "image_nou1",
                "likes" => 501,
                "is_publisched" => 1,

            ]);

        dd($x->id);
    }

    public function delete()
    {
        $post = Post::find(6);
        $post->delete();
        dd("deleted");
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("post.index");
    }

    public function update(Post $post)
    {
        $data = request()->validate(
            [
                "title" => "string",
                "content" => "string",
                "image" => "string",
                "category_id" =>"",
                "tags"=>""
                //   "likes"=>"integer"
            ]
        );
        $tags= $data["tags"];
        unset($data["tags"]);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route("post.show", $post->id);
    }

    public function show(Post $post)
    {

        return view("post.show", compact("post"));

    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.edit", compact("post","categories","tags"));

    }


    public function store()
    {

        $data = request()->validate(
            [
                "title" => "required|string",
                "content" => "string",
                "image" => "string",
                "category_id"=>"",
                "tags"=>""
                //   "likes"=>"integer"
            ]
        );
        $tags= $data["tags"];
        unset($data["tags"]);
        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route("post.index");
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.create",compact("categories", "tags"));
    }

    //
    public function index()
    {
        $posts = Post::all();
        return view("post.index", compact("posts"));
    }
}
