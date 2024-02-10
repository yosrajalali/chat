<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>
<body>
  
  
  <form action="/login/store" method="post">
    <div class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
      <div class="relative py-3 sm:w-96 mx-auto text-center">
        <span class="text-2xl font-light ">Login to your account</span>

        <?php if(!empty($error)):?>
          <h1 class="text-red-500 text-center mt-3"><?= $error ?></h1>
        <?php endif;?>

        <div class="mt-4 bg-white shadow-md rounded-lg text-left">
          <div class="h-2 bg-indigo-500 rounded-t-md"></div>
          <div class="px-8 py-6 ">
            <label for="username" class="block font-semibold"> Username </label>
            <input type="text" placeholder="Username" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md" name="username" id="username">
            <label for="password" class="block mt-3 font-semibold"> Password </label>
            <input type="password" placeholder="Password" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md" name="password" id="password">
              <div class="flex justify-between items-baseline">
                <input type="submit" name="submit" id="submit" value="Login" class="mt-4 bg-indigo-500 text-white py-2 px-6 rounded-md hover:bg-indigo-600 ">
                <a href="/register/create" class="text-sm hover:underline">Sign up</a>
              </div>
          </div>
      </div>
    </div>
  </form>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../assets/css/login.css">
</head>
<body>
<section>
  
  <div class="box">
    
    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>
    
   <div class="container"> 
    <div class="form"> 
      <h2>Login to Chatroom</h2>

      <form action="" method="post">

        <div class="inputBx">
          <input type="text" name="username" required="required">
          <span>Username</span>
          <i class="fas fa-user-circle"></i>
        </div>
        <div class="inputBx password">
          <input id="password-input" type="password" name="password" required="required">
          <span>Password</span>
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          <i class="fas fa-key"></i>
        </div>
        
        <div class="inputBx">
          <input type="submit" value="Log in" disabled> 
        </div>
      </form>
      
      <p>Don't have an account <a href="/register/index">Sign up</a></p>
    </div>
  </div>
    
  </div>
</section>
</body>

<script src="../../assets/js/login.js"></script>
</html>