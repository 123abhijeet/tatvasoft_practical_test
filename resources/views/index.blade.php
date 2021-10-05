<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
    <h4>@if(!empty(Auth::id())){{Auth::user()->name}} <span><a href="{{route('dashboard')}}">Manage
            Your Blog</a></span> 
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="float-end">Sign Out</button>
        </form>  @else <a href="{{route('login')}}" class="float-end">Login</a> @endif
    </h4> <br> <br>

    <div class="container">
        @foreach($blog as $blogdata)
        <div class="card mb-3" style="max:width:540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'.$blogdata->blog_image)}}" height="200" width="200">

                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title">
                            {{$blogdata->blog_title}}
                        </div>
                        <div class="card-title">
                            {{$blogdata->blog_tag}}
                        </div>
                        <div class="card-text">
                            {{$blogdata->blog_description}}
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::id())
            <a href="{{route('update_blog',$blogdata->id)}}">Edit</a> &nbsp;
            <a onclick="return confirm('Are you sure to delete')"
                href="{{route('delete_blog',$blogdata->id)}}">Delete</a>
            @endif
        </div>
        @endforeach
    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    < /body>  <
    /html >