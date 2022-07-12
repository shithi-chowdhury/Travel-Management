<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="hotel_package.css">
    <style>
    *
    {
      padding: 0;
      margin: 0;
      text-decoration: none;
      list-style: none;
      box-sizing: border-box;
    }
    body
    {
      background-image: url("images/back5.jpg");
      background-repeat: no-repeat;
      background-attachment: scroll;

      background-size: cover;
      height: calc(100vh-80px);
      min-height: 740px;
      font-family: montserrat;
    }
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
  border-radius: 100px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(255,182,193);
}

img {
  border-radius: 100px 100px 100px 100px;
}

.container {
  padding: 40px 16px;
}
</style>
</head>

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







          <?php

          $db_server = "localhost";
          $db_user = "root";
          $db_pass = "";
          $db_name = "project-299";

          $conn= mysqli_connect($db_server,$db_user,$db_pass,$db_name);

          if(!$conn){
            die("Connection Failed!: ".mysqli_connect_error());
          }



    $useremail= $_SESSION["emailID"];
    $sql="SELECT *
          FROM tourist
          WHERE
        tourist_email = '$useremail'
        ";

     $result=mysqli_query($conn,$sql);
     if (mysqli_num_rows($result)>0) {
       while ($row = mysqli_fetch_assoc($result)) {

             echo'<tr>
             <td>



             <div class="card"> <div style = "text-align : center"><img src="images/'.$row['tourist_image'].'" height="200" width="200"><br>


                  <div class="container">  <div style = "text-align: center"><h4>Name:  </b><td>'.$row['tourist_firstName'].'</td> <td>'.$row['tourist_lastName'].'</td><br> </div>


                 <div style = "text-align : center"> <b>Email Address:  </b><td>'.$row['tourist_email'].'<br> </div>
                   <div style = "text-align : center">   <b>Phone Number:  +880</b><b>'.$row['tourist_phone'].'</b><br> </div>
                       <div style = "text-align : center"> <b>Address:  </b><td>'.$row['tourist_address'].'</td><br></div>



                     <div style = "text-align : center">  <td><a href="edit_profile.php?id='.$row['tourist_id'].'"><input class="btn btn-primary" type="submit" value="Edit">
                     </div>



</td>
                </tr>';


           }
       }


?>
</div>


  </body>
</html>
<?php include "footer.php" ?>
