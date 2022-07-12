<?php
  require 'connections.php';
  session_start();

  if(isset($_POST['hotel_name']) &&
    isset($_POST['package_name']) &&
    isset($_POST['guide_firstName']) &&
    isset($_POST['transport_id']) &&
    isset($_POST['travel_date']) &&
    isset($_POST['num_person'])){

      $hotel_name   =  $_POST['hotel_name'];
      $package_name =  $_POST['package_name'];
      $transport_id =  $_POST['transport_id'];
      $num_person =  $_POST['num_person'];
      $travel_date =  $_POST['travel_date'];
      $guide_firstName =  $_POST['guide_firstName'];
      $_SESSION['travel_date']=$travel_date;
      $_SESSION['num_person']=$num_person;
      $_SESSION['transport_id']=$transport_id;


  $tourist_email= $_SESSION["emailID"];
  $sql = "SELECT tourist_id
          FROM tourist
          WHERE tourist_email = '$tourist_email'";
  $tourist=mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($tourist);
  $tourist_id= max($row);


  $sql2 = "SELECT hotel_id
          FROM hotel
          WHERE hotel_name = '$hotel_name'";
  $hotel=mysqli_query($conn,$sql2);
  $row2 = mysqli_fetch_array($hotel);
  $hotel_id= max($row2);

  $sql3 = "SELECT guide_id
          FROM guide
          WHERE guide_firstName = '$guide_firstName'";
  $guide=mysqli_query($conn,$sql3);
  $row3 = mysqli_fetch_array($guide);
  $guide_id= max($row3);

  $sql4 = "SELECT package_id
          FROM package
          WHERE package_name = '$package_name'";
  $package=mysqli_query($conn,$sql4);
  $row4 = mysqli_fetch_array($package);
  $package_id= max($row4);

  $sql="INSERT INTO booking(tourist_id,hotel_id, package_id, transport_id, num_person, travel_date, guide_id, pm_id)
        values('$tourist_id', '$hotel_id', '$package_id', '$transport_id', '$num_person', '$travel_date', '$guide_id', 'u')";
  $result=mysqli_query($conn,$sql);

  if($result)
  {
    echo "<script>
           alert('Please complete your payment now')
           window.location.href= 'payment.php'
          </script>";

  }
  else {
    echo "<script>
           alert('Failed')
           window.location.href= 'booking.php'
          </script>";
  }


}
else {
  echo "<script>
         alert('Try again')
         window.location.href= 'booking.php'
        </script>";
}


?>
     </body>
     <div><?php include 'footer.php'; ?></div>
   </html>
