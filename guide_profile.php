<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Guide Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="guide_profile.css">
    <link rel="stylesheet" href="dashboard.css">
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

        include 'connections.php';


      $guide_email= $_SESSION["emailID"];
      $sql="SELECT *
            FROM guide
            WHERE
          guide_email = '$guide_email'";

       $result=mysqli_query($conn,$sql);
       if (mysqli_num_rows($result)>0) {
         while ($row = mysqli_fetch_assoc($result)) {

               echo'<div class="wrapper">
                   <div class="left">
                     <img src="images/'.$row['guide_image'].'" alt="user" style="width:100%">
                       <h4>'.$row['guide_firstName'].' '.$row['guide_lastName'].'</h4>
                        <p>Tour Guide</p>
                   </div>
                   <div class="right">
                       <div class="info">
                           <h3>Information</h3>
                           <div class="info_data">
                                <div class="data">
                                   <h4>Email</h4>
                                   <p>'.$row['guide_email'].'</p>
                                   <h4>Phone</h4>
                                    <p>0'.$row['guide_phone'].'</p>
                                </div>
                                <div class="data">

                             </div>
                           </div>
                       </div>
                        <p><a href="guide_edit_profile.php?id='.$row['guide_id'].'"><button type="button" class="editbtn">Edit Profile</button></a></p>
                           </div>
                       </div>';

             }
         }


  ?>




</body>
</html>
