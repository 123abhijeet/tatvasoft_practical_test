<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
</head>

<body>
    <h3>Add Blog</h3>
    <form action="{{route('store_blog')}}" method="post" enctype="multipart/form-data">
        @csrf
        <span>Title :-</span>
        <input type="text" name="blog_title" required > <br>
        <span>Tag :-</span>
        <input type="text" name="blog_tag" required > <br>
        <span>Description :-</span>
        <textarea name="blog_description" required cols="30" rows="10"></textarea> <br>
        <span>Upload Image :-</span>
        <input type="file" name="blog_image" required > <br>
        <button type="submit">Add</button>
        <button type="button" onclick="window.history.back()">Cancle</button>
    </form>
</body>

</html>