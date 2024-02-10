<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../assets/css/register.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
    <form id="registerForm" action="/register/store" method="post">
        <h1>Sign up</h1>
        <div class="input">
            <input type="text" name="name" placeholder="Name" >
        </div>
        <div class="input">
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="input">
            <input type="text" name="email" placeholder="Email">
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="Password">
        </div>

        <button type="submit" name="submit" class="btn">Sign up</button>
        <p> Already have an account?
        <a href="/">Login</a>
        </p>
    </form>
</div>
</body>
</html>