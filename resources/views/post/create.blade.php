@extends("layouts.main")
@section("content")
<div class="container">
    <form action="{{route("post.store")}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title" >Title</label>
            <input
                value = "{{old("title")}}"
                type="text" class="form-control" id="title" name="title" placeholder="Title">
            @error("title")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" >Content</label>
            <textarea  value = "{{old("content")}}" class="form-control" id="content" name="content" placeholder="Content"></textarea>
            @error("content")
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image" >Image</label>
            <input value = "{{old("image")}}" type="text" class="form-control" id="image" name="image" placeholder="Image">
            @error("image")
            <p class="text-danger">{{$message}}</p>
            @enderror
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
                    {{old("category_id") == $category->id ? "selected" : ""}}
                    value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple id="tags" class="form-control"  name="tags[]">

            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
