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
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id">

                @foreach ($categories as $category)
                    <option
                        {{$category->id == $post->category_id ? "selected" : ""}}
                        value="{{$category->id}} ">{{$category->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple id="tags" class="form-control"  name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                        {{$postTag->id === $tag->id ? "selected" :""}}
                            @endforeach

                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>




        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
