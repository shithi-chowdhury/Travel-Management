<?php
session_start();
require 'connections.php';
if(
   isset($_POST['restaurant_name']) &&
   isset($_POST['restaurant_email']) &&
   isset($_POST['restaurant_phone_number'])&&
   isset($_POST['restaurant_address'])&&
   isset($_POST['restaurant_description'])&&
   isset($_POST['city_id'])&&
   isset($_POST['restaurant_password'])
   )
   {
     $restaurant_name = $_POST['restaurant_name'];
     $restaurant_email = $_POST['restaurant_email'];
     $restaurant_phone_number = $_POST['restaurant_phone_number'];
     $restaurant_address = $_POST['restaurant_address'];
     $restaurant_description = $_POST['restaurant_description'];
     $city_id = $_POST['city_id'];
     $restaurant_password = $_POST['restaurant_password'];

     $sql1 = "SELECT restaurant_email
              FROM restaurant
              WHERE restaurant_email = '$restaurant_email'";

     $result = mysqli_query($conn, $sql1);

     if (mysqli_num_rows($result)>0) {
      echo "<script>
             alert('Your account already exists!')
             window.location.href= 'restaurant_loginForm.php'
            </script>";
     }

     else {
     $sql2 = "INSERT INTO restaurant(restaurant_name, restaurant_email, restaurant_phone_number, restaurant_address, restaurant_description, city_id,  restaurant_password)
              VALUES('$restaurant_name', '$restaurant_email', '$restaurant_phone_number', '$restaurant_address','$restaurant_description','$city_id', '$restaurant_password')";

        $is_inserted = mysqli_query($conn, $sql2);

        if($is_inserted){
          $_SESSION['emailID']=$restaurant_email;
          echo "<script>
                alert('Hooraah! You have a new account!')
                window.location.href= 'restaurant_dashboard.php'
                </script>";
                exit;
        }
        else{
          echo "<script>
                alert('Sorry! Try again!')
                window.location.href= 'restaurant_signupForm.php'
                </script>";
                exit;
        }
    }

  }
else{
  echo "404 not found";
}
?>
