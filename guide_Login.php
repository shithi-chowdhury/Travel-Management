<html>
    <head>
       <title>log in </title>
        <link rel="stylesheet" href="guide_login.css">
    </head>
    <body>
       <div class="login-box">
          <h1>Guide Login</h1>
          <form action="insert_guide_LoginForm.php" method="POST">
          <div class="textbox">
            <i class="fas fa-user"></i>
             <input type="email" placeholder="example@gmail.com" name="email" value="">

          </div>
           <div class="textbox">
            <i class="fas fa-lock"></i>
             <input type="password" placeholder="Password" name="psw" value="">
          </div>
          <button class="btn" type="lgnbtn">Login</button>
          <a href="index.php"><button type="button" class="btn">Cancel</button></a>
        </form>
       </div>
    </body>
</html>
