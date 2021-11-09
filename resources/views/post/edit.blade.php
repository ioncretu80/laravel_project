@extends("layouts.main")
@section("content")
<div class="container">
    <form action="{{route("post.update", $post->id)}}" method="post">
        @csrf
        @method("patch")
        <div class="form-group">
            <label for="title" >Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$post->id}}">
        </div>
        <div class="form-group">
            <label for="content" >Content</label>
            <textarea  class="form-control" id="content" name="content" placeholder="Content" >{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="image" >Image</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Image" value="{{$post->image}}">
        </div>
{{--        <div class="form-group">--}}
{{--            <label for="likes" >Likes</label>--}}
{{--            <input type="text" class="form-control" id="likes" name="likes" placeholder="Likes">--}}
{{--        </div>--}}




        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
