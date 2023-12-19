<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
    <div>
    <h1 class="judul">Registration Form</h1>
    </div>
    <form action="/register" method="post">
    @csrf
    <div>
        <br>
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" placeholder="username"><br>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" placeholder="password">
    </div>
    <br>
    <button type="submit">Register</button>
    <small>Already registered? <a href="/login">Login</a></small>
    </form>


</body>
</html>