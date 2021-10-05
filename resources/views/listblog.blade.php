<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Blog List</title>
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
 <h4 class="float-end"> Welcome  [ {{Auth::user()->name}} ]</h4> <br> <br>
 <a href="{{route('index')}}" class="float-end">Home</a> <br>
  <form action="{{route('logout')}}" method="POST">
      @csrf
      <br>
      <button type="submit" class="float-end">Sign Out</button>  <br>
  </form> <br>
 <h4><a href="{{route('addblog')}}">ADD BLOG</a></h4> 
  <h2 class="text-center">Blog List</h2> <br>
<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th>S No.</th>
        <th>Title</th>
        <th>Tags</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($blog as $key => $blogdata)
    <tr>
        <td>{{++$key}}</td>
        <td>{{$blogdata->blog_title}}</td>
        <td>{{$blogdata->blog_tag}}</td>
        <td>{{$blogdata->blog_description}}</td>
        <td><img src="{{ asset('storage/'.$blogdata->blog_image)}}" height="50" width="50"/></td>
        <td> <a href="{{route('update_blog',$blogdata->id)}}">Edit</a> &nbsp;<a onclick="return confirm('Are you sure to delete')" href="{{route('delete_blog',$blogdata->id)}}">Delete</a> </td>
    </tr>
    @endforeach
</tbody>
</table>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>