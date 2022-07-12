<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <html lang="en" dir="ltr">
  <title> Login</title>
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="login_tourist.css"
</head>
  <body>
    <div class="container">
      <div class="header">
        <h1>Tourist Login</h1>
      </div>
      <div class="main">
          <i class="fas fa-user"></i>
          <form action="insert_tourist_LoginForm.php" method="POST" class="containerClogin">
            <input type="email" placeholder="email" name="email" required> <br>

            <input type="password" placeholder="password" name="psw" required><br>

             <button>login</button>
          <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>

</form>
</div>
</body>
</header>
</html>
