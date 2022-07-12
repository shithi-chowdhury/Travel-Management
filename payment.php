
    <?php
    require "connections.php";
    session_start();
    $package_id= $_SESSION['package_id'];
    $num_person = $_SESSION['num_person'];
    $transport_id = $_SESSION['transport_id'];

    $tourist_email= $_SESSION["emailID"];
    $sql = "SELECT tourist_id
            FROM tourist
            WHERE tourist_email = '$tourist_email'";
    $tourist=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($tourist);
    $tourist_id= max($row);

  $sql3="SELECT package_cost
         FROM package
         where package_id='$package_id'";
  $package=mysqli_query($conn,$sql3);
  $row3 = mysqli_fetch_array($package);
  $package_cost= max($row3);

  $sql4="SELECT transport_price
         FROM transport
         where transport_id='$transport_id'";
  $transport=mysqli_query($conn,$sql4);
  $row4 = mysqli_fetch_array($transport);
  $tranport_price= max($row4);


  $sql5="SELECT tourist_id
         from booking
         where tourist_id='$tourist_id'";
  $searchingolderbooking=mysqli_query($conn,$sql5);
  $searchingolderbooking1=mysqli_fetch_assoc($searchingolderbooking);
  if(is_null($searchingolderbooking1)){
  $searchingolderbooking2=null;
  }
  else{
  $searchingolderbooking2=$searchingolderbooking1['tourist_id'];
  }
  if(is_null($searchingolderbooking2))
  {
  $total_amount=(((($package_cost+$transport_price)-(($package_cost+$tranport_price)*15/100)))*$num_person);
  echo "Dear client, you got 15% flat discount as this is your first booking. Please complete your payment. Thank you!<br>";
  }
  else
  {
  $total_amount= ((($package_cost+$tranport_price))*$num_person);
  }


    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8">
        <title>Payment</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tourist_profile.css">
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="style.css" class="css" />
        <link rel="stylesheet" href="payment.css">

      </head>
      <body>
        <nav>



          <label class="logo">CSE299Project</label>
          <ul>
            <li><a class="active" href="tourist_dashboard.php">Home</a></li>
            <li><a href="tourist_profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><p><?php

                    echo "<p style='color:white;'>" .$_SESSION["emailID"];
                   ?>
               </p></li>
          </ul>

        </nav>
        <div class="container">
      <div class="feature-display">
        <div class="register-text">
          <div>
            <form style="width: 45vh" action="insert_payment.php" method="POST">
              <p>Your total amount for this package is <?php echo $total_amount ?> BDT</p>
              <p>Please pay 30% of the amount now. Send money through bkash to 01741247754</p>
              <div class="register-form"><label>Amount(30% of the total amount)</label><input type="text" name="amount" readonly value="<?php echo $total_amount*30/100 ?>"></div>
              <p>After finishing payment through Bkash, please input the Transaction ID and your mobile number from which you have completed your payment</p>
              <div class="register-form"><label>Mobile No.</label><input type="tel" placeholder="01*********" name="phone_number" pattern="[0]{1}[1]{1}[0-9]{3}[0-9]{6}" maxlength="11" minlength = "11" required></div>
              <div class="register-form"><label>Transaction ID</label><input type="text" id="usr" name="tranid" maxlength="7" minlength = "7" required></div>

              <div style="display: flex; align-items: center; justify-content: flex-end; padding: 30px;">
                <div class="register-form">
                  <label for=""></label>
                  <input type="submit" class="submit-now-btn">
                </div>

              </div>
            </form>
          </div>
    </div>
    </div>
  </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    </body>

  </html>
<div><?php include 'footer.php'; ?></div>
