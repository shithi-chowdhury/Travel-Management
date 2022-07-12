<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="restaurant_loginForm.css">
    <title>Restaurant Log in</title>
  </head>
  <body>
      <div class="session">
        <div class="left">
        </div>

        <form action="insert_restaurant_loginForm.php" method="POST">
          <h4>Welcome Back</h4>
          <p>Please enter Restaurant email and password to Login</p>

          <div class="floating-label">
            <input placeholder="Email" type="email" name="restaurant_email" id="email" required>
          </div>
          <div class="floating-label">
            <input placeholder="Password" type="password" name="restaurant_password" id="password" required>
          </div>
          <button>Log in</button>
          <a href="index.php"><button type="button">Cancel</button></a>
        </form>

      </div>
</body>
</html>
