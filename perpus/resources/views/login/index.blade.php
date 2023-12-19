<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
    @if(session()->has('success')) {{ session('success') }}
    @endif
    <form action="/login" method="post">
    @csrf
    <div>
    <h1 class="judul">Please sign in</h1>
    </div>
    <div>
        <br>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" placeholder="username"><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" placeholder="password">
    </div>
    <br>
    <button type="submit">Sign In</button>
    <small>Not registered? <a href="/register">Register Now!</a></small>
    </form>


</body>
</html>