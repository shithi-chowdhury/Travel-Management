<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Restaurant Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="restaurant_details.css">

  </head>
  <body>
    <nav>



      <label class="logo">CSE299Project</label>
      <ul>
        <li><a class="active" href="tourist_dashboard.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><p><?php
                session_start();
                echo "<p style='color:white;'>" .$_SESSION["emailID"];
               ?>
           </p></li>
      </ul>

    </nav>


    <div class="container2">
      <div class="header">


<?php
require 'connections.php';
$restaurant_id = $_GET['id'];

$sql="SELECT *
      FROM restaurant
      WHERE restaurant_id = '$restaurant_id'";

     $result=mysqli_query($conn,$sql);
     if (mysqli_num_rows($result)>0) {
       while ($row = mysqli_fetch_assoc($result)) {

             echo' <div class="card2"> <div style = "text-align : center"; color : "white"; font-size: "100px";><br>
                     <h1> Restaurant Info </h1>
                     <strong><h3><b>'.$row['restaurant_name'].'</b></h3><br>
                     '.$row['restaurant_address'].'<br><br>
                     <p>Contact us at: <br>
                     +880</b><b>'.$row['restaurant_phone_number'].'<br>
                     or <br>
                     '.$row['restaurant_email'].'</p><br>
                     About us: '.$row['restaurant_description'].'<br></strong>
                </div></br>
                </div>';


           }
       }


?>
</div>
</div>

<div class="dd_heading">
  <h2 class="text-center">Food details</h2>
<h3 class="text-center">Please check the list</strong></h3>
</div>

<div class="container mt-2">
 <div class="row">

    <?php

    $sql="SELECT *
          FROM food
          WHERE restaurant_id='$restaurant_id'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
      while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="col-md-3 col-sm-6 item">
                        <div class="card item-card card-block">
                      <img src="images/'.$row['food_image'].'" alt="">
                        <h2 class="heading">'.$row['food_name'].'</h2>
                        <p class="data-content">Price: '.$row['food_price'].'</p>
                        <p class="data-content">Description: '.$row['food_description'].'</p>
                  </div>
                    </div>';

      }

  }
  ?>
</div>
</div><br><br><br><br><br><br><br><br><br>
  </body>
</html>



<?php include 'footer.php'; ?>
