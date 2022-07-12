<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Food Enlist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="food_enlist.css">
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
            <li><a href="restaurant_dashboard.php">Home</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><p><?php
                          session_start();
                          echo "Welcome " .$_SESSION["emailID"];
                   ?>
                </p></li>

          </ul>
        </nav>
        <div class="bg-image"></div>

        <div class="bg-text">

        <h1>Please fill in this form to enlist your food</h1>

        <form action="insert_food_enlist.php" method="post" enctype="multipart/form-data">

        <label for="p_name">Food Name:</label><br>
        <input type="text" placeholder="Enter Your Food Name" name="food_name" required><br><br>

        <label for="price"><b>Price:</b></label><br>
        <input type="number" min="1" name="food_price" required><br><br>

        <label for="description">Description:</label><br>
        <input type="text" placeholder="Food Description" name="food_description" required><br><br>

        <label for="img">Select image:</label><br>
        <input type="file" name="food_image" accept="image/*"><br><br><br>

        <button type="submit">Enlist</button>
        </form>
      </div>


    </body>

</html>
