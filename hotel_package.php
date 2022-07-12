<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hotel_package.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <li class="active">

      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Cse299Project</label>
      <ul>

        <li><p><?php
                      session_start();
                      echo "Welcome " .$_SESSION["emailID"];
               ?>
            </p></li>
      </ul>
    </nav>
<?php

require 'connections.php';
$city_id = $_GET['id'];
$_SESSION['city_id']=$city_id;

$useremail= $_SESSION["emailID"];


$sql1 = "SELECT *
        FROM package p
        JOIN hotel h
        ON p.hotel_id = h.hotel_id
        JOIN city c
        ON c.city_id = h.city_id
        AND c.city_id = '$city_id'";

$result=mysqli_query($conn,$sql1);
      if (mysqli_num_rows($result)>0) {
          echo '<table>
                <tr>
                <th>Package Name</th>
                <th>Attractions</th>
                <th>Destination</th>
                <th>Duration (Days)</th>
                <th>Cost (BDT)</th>
                <th>Hotel</th>
                <th>City</th>
                <th>Option</th>
                </tr>';

      while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>
                <td>'.$row['package_name'].'</td>
                <td>'.$row['attractions'].'</td>
                <td>'.$row['destination'].' </td>
                <td>'.$row['duration'].'</td>
                <td>'.$row['package_cost'].'</td>
                <td>'.$row['hotel_name'].'</td>
                <td>'.$row['city_name'].'</td>
                <td><a href="hotel_booking.php?id='.$row['package_id'].'"><button class="button"><span>See details</span></button></a></td>
                </tr><br>';
            }
        }
?>
</body>
</html>
</body>
</html>
