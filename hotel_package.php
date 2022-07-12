<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hotel_package.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <li class="active">
      <div class="sub-menu-1">
           <ul>
               <li><a href="restaurant.php?id='.$row['city_id'].'"><span>Restaurants</a></li>
           </ul>
       </div>

      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Cse299Project</label>
      <ul>

        <li><p><?php
                      session_start();
                      echo "Welcome " .$_SESSION["emailID"];
               ?>
            </p></li>
      </ul>
    </nav>


</body>
</html>





<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.5/waves.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-5">


		<!-- cascading cards -->
		<div class="row">
			<div class="col-12 mb-4">
				<h3>Package Details:</h3>
				<p>Please click see details to know more about our packages.</p>
			</div>

            <?php
            require 'connections.php';
            $city_id = $_GET['id'];
            $_SESSION['city_id']=$city_id;
            $useremail= $_SESSION["emailID"];


            $sql1 = "SELECT *
                     FROM package p
                     JOIN hotel h
                     ON p.hotel_id = h.hotel_id
                     JOIN city c
                     ON c.city_id = h.city_id
                     AND c.city_id = '$city_id'";

                     $result=mysqli_query($conn,$sql1);
                     if (mysqli_num_rows($result)>0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                         echo '<div class="col-lg-4">
                   				<div class="card card-cascade card-cascade-wider mb-5">

                   					<img class="card-img-top" src="images/'.$row['package_image'].'" alt="Card image cap">
                   					   <div class="card-body">
                               <h5 class="card-title">'.$row['attractions'].'</h5>
                               <p><b>Cost(BDT): </b>'.$row['package_cost'].'</p>
                               <p><b>City: </b>'.$row['city_name'].'</p>
                               <a href="hotel_booking.php?id='.$row['package_id'].'" class="card-link">See details</a>
                               <div class="ico-card">
                               </div>
                               				</div>
                               			</div>
                               		</div>';
              }
          }
  ?>

	</div>

  </div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.5/waves.js"> </script>

	<script>
		Waves.attach (
			'[class*=card-img]',
			['waves-light']
		);
		Waves.init();
	</script>

</body>
</html>
<?php include 'footer.php'; ?>
