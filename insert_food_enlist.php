<?php
session_start();
require 'connections.php';

if(isset($_POST['food_name'])&&
   isset($_POST['food_price'])&&
   isset($_POST['food_description'])&&
   isset($_FILES['food_image'])){

  $restaurant_email=$_SESSION['emailID'];
  $sqll ="SELECT restaurant_id
          FROM restaurant
          WHERE restaurant_email='$restaurant_email'";
  $restaurant=mysqli_query($conn,$sqll);
  $row = mysqli_fetch_array($restaurant);
  $restaurant_id= max($row);
  $food_image=$_FILES['food_image']['name'];
  $tmp_name=$_FILES['food_image']['tmp_name'];
  $error=$_FILES['food_image']['error'];
  $food_name = $_POST['food_name'];
  $food_price = $_POST['food_price'];
  $food_description = $_POST['food_description'];
  $img_ex=pathinfo($food_image,PATHINFO_EXTENSION);
  $img_ex_lc=strtolower($img_ex);
  $allowed_exs= array("jpg","jpeg","png");
  if (in_array($img_ex_lc, $allowed_exs)) {
				$img_upload_path = "images/".$food_image;
				move_uploaded_file($tmp_name, $img_upload_path);
    $sql="INSERT INTO food(food_name, food_price, food_description, food_image, restaurant_id)
          values('$food_name','$food_price', '$food_description', '$food_image', '$restaurant_id')";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
      echo "<script>
             alert('Enlist Successful!')
             window.location.href= 'restaurant_dashboard.php'
            </script>";

    }

    else {
      echo "Failed";
    }
  }

  else {
    echo "<script>
           alert('You have uploaded wrong file type!')
           window.location.href= 'food_enlist.php'
          </script>";
  }

}
