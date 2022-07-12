<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hotel_booking.css">
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
$package_id = $_GET['id'];
$_SESSION['package_id']=$package_id;
$useremail= $_SESSION["emailID"];


$sql1 = "SELECT *
        FROM package p
        JOIN hotel h
        ON p.hotel_id = h.hotel_id
        JOIN city c
        ON c.city_id = h.city_id
        JOIN guide g
        ON p.guide_id = g.guide_id
        AND p.package_id = '$package_id'";

$result=mysqli_query($conn,$sql1);
      if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
echo "<h1><b>$row[package_name]</b></h1>";
          echo '
              <table>
                    <tr>
                      <td>City:</td> <td>'.$row['city_name'].'</td>
                    </tr>
                    <tr>
                      <td>Places to visit:</td> <td>'.$row['attractions'].'</td>
                    </tr>
                    <tr>
                      <td>Cost:</td> <td>'.$row['package_cost'].' BDT</td>
                    </tr>
                    <tr>
                      <td>Duration:</td> <td>'.$row['duration'].' Days</td>
                    </tr>
                    <tr>
                      <td>Hotel:</td> <td>'.$row['hotel_name'].'</td>
                    </tr>
                    <tr>
                      <td>Guide Name:</td> <td>'.$row['guide_firstName'].' '.$row['guide_lastName'].'</td>
                    </tr>
                    <tr>
                    <a href="booking.php?id='.$row['package_id'].'"><button class="button"><span>Book Now!</span></button></a>
                    </tr>
              </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
            }
        }
?>

</body>
</html>


<?php include 'footer.php'; ?>
