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


  <div class="feature-booking">

    <?php

    require 'connections.php';
    $useremail= $_SESSION["emailID"];


    $serial=1;
$booking_result=mysqli_query($conn, "SELECT package.package_name AS Package,hotel.hotel_name AS Hotel,transport.transport_id AS Transport,package.package_cost AS Amount,booking.travel_date

FROM booking LEFT OUTER JOIN (hotel,package,transport)

ON booking.hotel_id= hotel.hotel_id  AND booking.package_id=package.package_id AND booking.transport_id=transport.transport_id

WHERE booking.tourist_id=(SELECT tourist.tourist_id

FROM tourist

WHERE tourist.tourist_email= '$useremail')" );


      ?>

  			<h1 style="color: black; text-align: center;"><?php echo 'Booking History';?></h1>
        <table>
  				<tr>
            <th>Serial</th>
  					<th>Package</th>
            <th>Hotel</th>
            <th>Transport</th>
            <th>Package Cost</th>
            <th>Travel Date</th>

  				</tr>
<?php
if(mysqli_num_rows($booking_result) > 0)

{while ($gogo=mysqli_fetch_assoc($booking_result))
  { echo " <tr>
    <td>".$serial++."</td>
    <td>".$gogo['Package']."</td>
    <td>".$gogo['Hotel']."</td>
    <td>".$gogo['Transport']."</td>
    <td>".$gogo['Amount']."</td>
    <td>".$gogo['travel_date']."</td>
    </tr> <br> ";}}
?>

  			</table>

</div>
</div>



</body>

</html>
