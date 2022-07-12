<?php

session_start();

require 'connections.php';

if(isset($_POST['restaurant_email']) &&
   isset($_POST['restaurant_password'])){

  $restaurant_email = $_POST['restaurant_email'];
  $restaurant_password = $_POST['restaurant_password'];
  $sql="SELECT *
        FROM restaurant
        WHERE restaurant_email = '$restaurant_email'
        AND restaurant_password = '$restaurant_password'
        LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result)==1){
    $_SESSION['emailID']=$restaurant_email;
    echo "<script>
          alert('Hello! Welcome to our website.')
          window.location.href= 'restaurant_dashboard.php'
          </script>";
          exit;
  }else{
    echo "<script>
          alert('Oops! Your email or password is wrong! Try again please!')
          window.location.href= 'restaurant_loginForm.php'
          </script>";
          exit;
  }
}

?>
