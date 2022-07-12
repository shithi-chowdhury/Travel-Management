<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Guide Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="restaurant_dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <li class="active">
      <div class="sub-menu-1">
           <ul>
               <li><a href="guide_profile.php">profile</a></li>
           </ul>
       </div>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Cse299Project</label>
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><p><?php
                      session_start();
                      echo "Welcome " .$_SESSION["emailID"];
               ?>
            </p></li>
      </ul>
    </nav>
<br><br>
<table>
      <tr>
      <th>Package name</th>
      <th>Tourist name</th>
      <th>Tourist Mobile No.</th>
      <th>Hotel</th>
      <th>Attractions</th>
      <th>Payment Status</th>
      <th>Payment done</th>
      </tr>
    <?php
    require 'connections.php';
    $guide_email=$_SESSION['emailID'];
    $sql ="SELECT *
            FROM booking b
            JOIN tourist t
            ON b.tourist_id = t.tourist_id
            JOIN package p
            ON b.package_id = p.package_id
            JOIN payment_status pm
            ON b.pm_id = pm.pm_id
            JOIN hotel h
            ON p.hotel_id = h.hotel_id
            JOIN transactions tr
            ON b.booking_id = tr.booking_id
            JOIN guide g
            ON b.guide_id = g.guide_id
            AND g.guide_email='$guide_email'";

    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {

    while ($row = mysqli_fetch_assoc($result)) {

      echo '<tr>
              <td>'.$row['package_name'].'</td>
              <td>'.$row['tourist_firstName'].' '.$row['tourist_lastName'].'</td>
              <td>0'.$row['tourist_phone'].'</td>
              <td>'.$row['hotel_name'].'</td>
              <td>'.$row['attractions'].'</td>
              <td>'.$row['pm_name'].'</td>
              <td>'.$row['amount'].'</td>
              </tr>';

      }

  }
  ?>


  </body>
</html>
