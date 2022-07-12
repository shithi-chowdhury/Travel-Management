<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>

  <body>

    <nav>
      <li class="active">
      <div class="sub-menu-1">
           <ul>
               <li><a href="tourist_profile.php">profile</a></li>
               <li><a href="">Restaurent</a></li>
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






    <?php
    require "connections.php";

    $useremail= $_SESSION["emailID"];
            $sql = "SELECT tourist_id
                    FROM tourist
                    WHERE tourist_email = '$useremail'";
            $tourist=mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($tourist);
            $tid= max($row);


    // Editing and updating user info


    $rj=mysqli_query($conn, "select * from tourist where tourist.tourist_email= '$useremail' ");
    $abc = mysqli_fetch_assoc($rj);
    $phn=$abc['tourist_phone'];
    $ebc=$abc['tourist_lastName'];
    $eby=$abc['tourist_firstName'];
    $fbc=$abc['tourist_address'];
    $id=$abc['tourist_id'];
    //deleting account
    if (isset ($_POST['delete']))
    {


     $delete_tourist="delete from tourist where tourist.tourist_email='$useremail'";
     $delete_tourist_query=mysqli_query($conn,$delete_tourist);




     if( $delete_tourist_query ){
       header("Location: tourist_profile.php");
     } else { header("Location: tourist_signup.php");}

    }

    ?>
    <?php
    // Editing and updating user info
    include 'connections.php';
  $phone=$lastname=$firstname=$address='';
    if (isset($_POST['submit'])){
    $phone=$_POST['tourist_phone'];
    $lastname=$_POST['tourist_lastName'];
    $firstname=$_POST['tourist_firstName'];
    $address=$_POST['tourist_address'];
    $phone=mysqli_real_escape_string($conn,$_POST['tourist_phone']);
    $lastname=mysqli_real_escape_string($conn,$_POST['tourist_lastName']);
    $firstname=mysqli_real_escape_string($conn,$_POST['tourist_firstName']);
    $address=mysqli_real_escape_string($conn,$_POST['tourist_address']);
    $update="UPDATE tourist SET  tourist.tourist_phone='$phone',tourist.tourist_lastName='$lastname',tourist.tourist_firstName='$firstname',tourist.tourist_address='$address' WHERE tourist.tourist_email='$useremail'";
    $ans=mysqli_query($conn,$update);
    if($ans)
    {echo "<script> alert ('Updated Successfully');
      window.location.href = 'edit_profile.php';
      </script>";

    exit;}
    }





    //changing password
    if (isset($_POST['save']))
    {
      $getoldpass=mysqli_query($conn,"select tourist_password from tourist where tourist.tourist_email='$useremail'");
      $getoldpass1=mysqli_fetch_assoc($getoldpass);

      if(($_POST['newpass']==$_POST['re_newpass']) AND ($_POST['currpass']==$getoldpass1['tourist_password']) )
      {
        $newpassword=$_POST['newpass'];
        if(!empty($newpassword))
        {
          $updatepass=mysqli_query($conn,"update tourist set tourist_password='$newpassword' where tourist_email='$useremail'");
          echo "Password Updated Successfully!";

        }
        else echo "failed! Try again!";
      }
      else
      {
        echo "failed! Try again!";

      }
    }





    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Settings</title>
    </head>
    <div class="wrapper" style="margin: 5vh 90vh;min-height: 90vh">

      <div class="feature-display">

        <div class="register-text">
          <div><h4>Edit user information</h4><hr></div>
          <div>
            <form style="width: 20vh" action="edit_profile.php" method="POST" text="center">

              <div class="register-form"><label><b>EmailID </b></label><?php echo '<input type="text" name="tourist_email" readonly value="'.$useremail.'">'; ?></div><br>
              <div class="register-form"><label><b>Phone Number </b></label><input type="text" id="scr" name="tourist_phone" value="<?php echo $phn ?>"></div><br>
              <div class="register-form"><label><b>Last Name </b></label><input type="text" id="usr" name="tourist_lastName" value="<?php echo $ebc ?>"></div><br>
              <div class="register-form"><label><b>First Name </label></b><input type="text" id="usr" name="tourist_firstName" value="<?php echo $eby ?>"></div><br>
              <div class="register-form"><label><b>Address </b></label><input type="text" id="usr" name="tourist_address" value="<?php echo $fbc ?>"></div><br>

              <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
                <div class="register-form">
                  <label for=""></label>
                  <input type="submit" id="submit" name="submit"  value="Save" href="tourist_profile.php">
                </div>

              </div>
            </form>
          </div>





          <div><h4>To change password:</h4><hr></div>
          <div>
          <form style="width: 30vh" action="edit_profile.php" method="POST">
            <div class="register-form"><label><b>Enter current password</b></label><input type="password" id="scr" name="currpass" value=""></div><br>
            <div class="register-form"><label><b>Enter new password</b></label><input type="password" id="scr" name="newpass" value=""></div><br>
            <div class="register-form"><label><b>Re-enter new password</b></label><input type="password" id="scr" name="re_newpass" value=""></div><br>
            <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
              <div class="register-form">
                <label for=""></label>
                <input type="submit" id="submit" name="save" value="Save" href="tourist_signup.php">
              </div>

            </div>
          </form>
          </div>
        </div>
    </div>





    <div><h4>Upload your picture:</h4><hr></div>
    <div>
      <form action="tourist_image.php" method="post" enctype="multipart/form-data">
        <label for="img">Select image:</label>
        <input type="file" name="tourist_image" accept="image/*">
      <div style="display: flex; align-items: center; justify-content: flex-end; padding: 40px;">
        <div class="register-form">
          <label for=""></label>
          <input type="submit">
        </div>

    </div>
    </form>
    </div>
    </div>
    </div>
      <div>

    <form style="width: 45vh"  method="POST">
         <div style="display: flex; align-items: center; justify-content: flex-end; padding: 20px;">
           <input type='submit' id = 'submit' name='delete' value='Delete Account' href='tourist_signup.php'>
           </div>
         </form>

      </div>

    </div>

    </body>

    </html>

    <?php include 'footer.php'; ?>
