<?php
  require "connections.php";
  session_start();

if(isset($_POST['amount']) &&
isset($_POST['phone_number']) &&
  isset($_POST['tranid'])
){
          $tourist_email= $_SESSION["emailID"];
          $sql = "SELECT tourist_id
                  FROM tourist
                  WHERE tourist_email = '$tourist_email'";
          $tourist=mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($tourist);
          $tourist_id= max($row);


    $amount   =  $_POST['amount'];
    $transaction_id =  $_POST['tranid'];
    $phone_number =  $_POST['phone_number'];
    $travel_date= $_SESSION['travel_date'];


    $sql2 = "SELECT booking_id
            FROM booking
            WHERE tourist_id = '$tourist_id'
            AND travel_date = '$travel_date'";
    $booking=mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($booking);
    $booking_id= max($row2);



    $sql3="INSERT INTO transactions(transaction_id, transaction_date, amount, booking_id, phone_number)
          VALUES('$transaction_id', '$travel_date', '$amount', '$booking_id', '$phone_number')";
    $result=mysqli_query($conn,$sql3);

    if($result)
    {
      $sql4 = "UPDATE booking
               SET pm_id = 'p'
               WHERE booking_id = '$booking_id'
               AND travel_date = '$travel_date'";
      $result2=mysqli_query($conn,$sql4);

      if ($result2) {
        echo "<script>
               alert('Done')
               window.location.href= 'tourist_dashboard.php'
              </script>";
      }


    }
    else {
      echo "<script>
             alert('Failed')
             window.location.href= 'payment.php'
            </script>";
    }

}
?>
