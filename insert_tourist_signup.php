<?php
session_start();
require 'connections.php';
if(

   isset($_POST['first_name']) &&
   isset($_POST['last_name']) &&
   isset($_POST['email']) &&
   isset($_POST['phone_number'])&&
   isset($_POST['address'])&&
   isset($_POST['password'])
   )
   {

     $firstName = $_POST['first_name'];
     $lastName = $_POST['last_name'];
     $email = $_POST['email'];
     $phone_number = $_POST['phone_number'];
     $password = $_POST['password'];
     $address = $_POST['address'];

     $sql1 = "SELECT tourist_email
              FROM tourist
              WHERE tourist_email = '$email'";

     $result = mysqli_query($conn, $sql1);

     if (mysqli_num_rows($result)>0) {
      echo "<script>
             alert('Your account already exists!')
             window.location.href= 'login.php'
            </script>";
     }

     else {
     $sql2 = "INSERT INTO tourist( tourist_lastName, tourist_firstName, tourist_email, tourist_phone, tourist_address,  tourist_password)
             VALUES( '$lastName', '$firstName', '$email', $phone_number,'$address', '$password')";

        $is_inserted = mysqli_query($conn, $sql2);

        if($is_inserted){
          $_SESSION['emailID']=$email;
          echo "<script>
                alert('Hooraah! You have a new account!')
                window.location.href= 'tourist_dashboard.php'
                </script>";
                exit;
        }
        else{
          echo "<script>
                alert('Sorry! Try again!')
                window.location.href= 'tourist_signup.php'
                </script>";
                exit;
        }
    }

  }
else{
  echo "404 not found";
}

 ?>
