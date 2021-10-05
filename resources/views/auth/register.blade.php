<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Register</title>
</head>
<br>
<br>
<br>
<body class="text-center">
<a href="{{route('index')}}" class="float-end">Home</a> <br>
    <div class="card">
        <div class="card-body">
            <form action="{{route('register')}}" method="post">
                @csrf
                    <span>Name :-</span>
                    <input type="text" name="name"><br><br>
                    <span>Email :-</span>
                    <input type="email" name="email"><br><br>
                    <span>Password :-</span>
                    <input type="password" name="password"><br><br>
                    <span>Confirm Password :-</span>
                    <input type="password" name="password_confirmation"><br><br>
                    <button type="submit">Register</button>
                    <a href="{{route('login')}}">Already have a membership?</a>

            </form>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>