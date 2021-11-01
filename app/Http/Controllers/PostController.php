<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function updateOrCreate(){
        Post::updateOrCreate([
            "title"=>"titlu_nou"
        ],
            [
                "title"=>"updateOrCreate",
                "content"=>"updateOrCreate",
                "image"=>"updateOrCreate",
                "likes"=>501,
                "is_publisched"=>1,
            ]);
        dump("updateOrCreate");
    }

    public function firstOrCreate(){
      $x=  Post::firstOrCreate([
            "title"=>"titlu_nou_first_or_create"
        ],
            [
                "title"=>"titlu_nou_first_or_create",
                "content"=>"content_nou1",
                "image"=>"image_nou1",
                "likes"=>501,
                "is_publisched"=>1,

        ]);

        dd($x->id);
    }
    public function delete(){
        $post = Post::find(6);
        $post->delete();
            dd("deleted");
    }
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
        $objects =[
            [
                "title"=>"titlu_nou",
                "content"=>"content_nou",
                "image"=>"image_nou",
                "likes"=>50,
                "is_publisched"=>1,
            ],
            [
                "title"=>"titlu_nou1",
                "content"=>"content_nou1",
                "image"=>"image_nou1",
                "likes"=>501,
                "is_publisched"=>1,
            ],



        ];

        foreach ($objects as $obj){

            Post::create($obj);
        }

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
