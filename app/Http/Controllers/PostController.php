<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function update(){

        $obj =[
            "title"=>"titlu_nou_updated",
            "content"=>"content_nou_updated",
            "image"=>"image_nou_updated",
            "likes"=>50,
            "is_publisched"=>1,

        ];
        $post = Post::find(3);
        $post->update($obj);
        dd("updated");

    }
    public function create(){
        $obj =[
            "title"=>"titlu_nou",
            "content"=>"content_nou",
            "image"=>"image_nou",
            "likes"=>50,
            "is_publisched"=>1,

        ];

        Post::create($obj);

        dd("create");
    }
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
