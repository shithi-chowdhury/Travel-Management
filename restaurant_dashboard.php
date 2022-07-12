<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Restaurant Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="restaurant_dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <li class="active">
      <div class="sub-menu-1">
           <ul>
               <li><a href="food_enlist.php">Add Food</a></li>
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
    <?php
    require 'connections.php';
    $restaurant_email=$_SESSION['emailID'];
    $sqll ="SELECT restaurant_id
            FROM restaurant
            WHERE restaurant_email='$restaurant_email'";
    $restaurant=mysqli_query($conn,$sqll);
    $row = mysqli_fetch_array($restaurant);
    $restaurant_id= max($row);

    $sql="SELECT *
          FROM food
          WHERE restaurant_id='$restaurant_id'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
      echo '<table>
            <tr>
            <th>Image:</th>
            <th>Name:</th>
            <th>Cost (BDT)</th>
            <th>Description</th>
            </tr>';
    while ($row = mysqli_fetch_assoc($result)) {

      echo '<tr>
              <td><img src="images/'.$row['food_image'].'" height="100" width="100"/></td>
              <td>'.$row['food_name'].'</td>
              <td>'.$row['food_price'].'</td>
              <td>'.$row['food_description'].'</td>
              </tr>';

      }

  }
  ?>


  </body>
</html>
