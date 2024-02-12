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
      <?php if($_GET['status'] === 'succuss'):?>
        <p class="succuss_msg">Acount Created Succussfully</p>
      <?php endif;?>
      
      <p class="invalid_err"><?=$errors?></p>

      <h2>Login to Chatroom</h2>

      <form action="/login/store" method="post">

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
          <input type="submit" name="submit" value="Log in"> 
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