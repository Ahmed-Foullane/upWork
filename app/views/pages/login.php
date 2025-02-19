<?php

// session_start();
require_once '../app/utils/utils.php';
// require_once "../controllers/auth.php";
// Redirect to profile if logged in
if (Utils::isLoggedIn()) {
  Utils::redirect('/home');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="/assets/css/auth.css?v=<?php echo time()?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' rel='stylesheet'>
 
  <!-- <link rel="stylesheet" href="/styles/main.css"> -->
  
  
</head>
<body>

<dive class="my_logo">
      <a href="/" class="logo">UpWork</a>
</dive> 
   <div>
            <?php
           
            echo Utils::displayFlash('register_success', 'green');
            echo Utils::displayFlash('login_error', 'red');
            ?>

   </div>
            


</div>

  
<div id="particles-js" class="login">

                <div class="login__forms">
                <form class="form" method="POST" action="/controllers/auth.php" class="login__registre form" id="login-in">
    <input type="hidden" name="login" value="1">  
    <h1 class="login__title">Sign In</h1>
    <div class="login__box">
    <i class='bx bx-at login__icon'></i>
        <input type="email" name="email" placeholder="Email" class="login__input">
    </div>

    <div class="login__box">
        <i class='bx bx-lock-alt login__icon'></i>
        <input type="password" name="password" placeholder="Password" class="login__input">
        <i onclick="show(this, false)"  class="fa-solid fa-eye eye open" style="font-size: 1.6em; display: none;"></i>
        <i onclick="show(this, true)" class="fa-solid fa-eye-slash eye close" style="font-size: 1.6em;"></i>
    </div>

    <button type="submit" class="login__button">Sign In</button>

    <div>
        <span class="login__account">Don't have an Account ?</span>
        <span class="login__signin" id="sign-up"><a href="/register"> Sign Up</a></span>
    </div>
</form>
                </div>
            </div>
        </div>


        
       
        <script src="js/script.js?v=<?php echo time();?>"></script>
        
</body>
</html>







