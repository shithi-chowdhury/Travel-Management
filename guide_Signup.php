<html>
    <head>

        <title> sign up form</title>
        <link rel="stylesheet" href="style.css">


    </head>
    <body>
      <div class="bgi-imgCsignup">
        <div class="contentCsignup">
          <form name = "signup" action="insert_guide_signup.php" style="border:1px solid #ccc" method="post" class="container">
            <div class="input-box">


              <h1>Register Here as guide</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>

              <label for="first_name"><b>First Name</b></label><br>
              <br><input type="text" placeholder="First Name" name="first_name" required><br>

              <label for="last_name"><b>Last Name</b></label><br>
              <input type="text" placeholder="Last Name" name="last_name" required><br>

              <label for="email"><b>Email</b></label><br>
              <input type="email" placeholder="example@gmail.com" name="email" required><br>

              <label for="address"><b>Address</b></label><br>
              <br><input type="text" placeholder="Address" name="address" required><br>

              <label for="phone_number"><b>Phone Number</b></label><br>
              <input type="tel" placeholder="01*********" name="phone_number" pattern="[0]{1}[1]{1}[0-9]{3}[0-9]{6}" required><br>

              <label for="password"><b>Password</b></label><br>
              <input type="password" placeholder="Password" name="password" required><br>

              <p>By creating an account you agree to our <a href="term.php" style="color:dodgerblue">Terms & conditions</a>.</p>

              <div class="clearfix">

                <button type="submit" class="signup-btn">Register</button>
                <a href="index.php"><button type="button" class="cancel-btn">Cancel</button></a>


              </div>
              <p>Already have an account?<a href="guide_login.php" style="color:black"> Click Here</a></p>
</div>
              </form>
            </div>

            </body>
          </html>
