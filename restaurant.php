<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Restaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="restaurant.css">
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
        <li><a href="logout.php">Logout</a></li>
        <li><p><?php
                      session_start();
                      echo "Welcome " .$_SESSION["emailID"];
               ?>
            </p></li>
      </ul>
    </nav>
    <?php
    require 'connections.php';
    $city_id = $_SESSION['city_id'];
    $useremail= $_SESSION["emailID"];


    $sql1 = "SELECT *
            FROM restaurant r
            JOIN city c
            ON c.city_id = r.city_id
            AND r.city_id = '$city_id'";

    $result=mysqli_query($conn,$sql1);
          if (mysqli_num_rows($result)>0) {
              echo '<table>
                    <tr>
                    <th>Restaurant Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Option</th>
                    </tr>';

          while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>
                    <td>'.$row['restaurant_name'].'</td>
                    <td>'.$row['restaurant_address'].'</td>
                    <td>'.$row['city_name'].'</td>
                    <td><a href="restaurant_details.php?id='.$row['restaurant_id'].'"><button class="button"><span>See details</span></button></a></td>
                    </tr><br>';
                }
            }
    ?>

    </body>
</html>
