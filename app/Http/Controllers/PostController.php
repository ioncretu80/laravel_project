<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(){
       echo("fiind(1)");
        $post = Post::find(1);
        dump($post->content);

        echo("all()");
        $posts = Post::all();
                foreach ($posts as $post){
            dump($post->content);
        }
        echo("where is publisched = 1");
        $posts = Post::where("is_publisched", 1)->get();
        foreach ($posts as $post){
            dump($post->content);
        }
    }
}
