@extends("layouts.main")
@section("content")
<div class="container">
    <div><a class= "btn btn-primary m-3" href="{{route("post.create")}}">Add neu</a></div>

    @foreach($posts as $post)

    <div><a href="{{route("post.show",$post->id)}}"> {{$post->id ." | ". $post->title}}</a></div>
        @endforeach
</div>
@endsection
