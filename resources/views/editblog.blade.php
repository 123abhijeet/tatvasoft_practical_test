<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
</head>

<body>
    <h3>Edit Blog</h3>
    <form action="{{route('store_updated_blog',$blog->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <span>Title :-</span>
        <input type="text" name="blog_title" value="{{$blog->blog_title}}"> <br>
        <span>Tag :-</span>
        <input type="text" name="blog_tag" value="{{$blog->blog_tag}}"> <br>
        <span>Description :-</span>
        <textarea name="blog_description" cols="30" rows="10"> {{$blog->blog_description}}</textarea> <br>
        <span>Upload Image :-</span>
        <input type="file" name="blog_image"> <br>
        <button type="submit">Update</button>
        <button type="button" onclick="window.history.back()">Cancle</button>
    </form>
    <img src="{{ asset('storage/'.$blog->blog_image)}}" height="200" width="200"/>
</body>

</html>