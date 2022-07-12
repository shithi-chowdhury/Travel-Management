<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tourist Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <style>
  .search-box {
	display: flex;
	justify-content: center;
	align-items: center;
}
.topnav input[type=text] {
	padding: 6px;
	font-size: 17px;
	/*border: none;*/

}

.card {
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	max-width: 250px;
}

.card:hover {
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
	padding: 2px 16px;
}

.feature-package {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-around;
	align-items: center;
}
.card {
	flex: 1 1 30%;
	min-width: 10%;
	max-height: 250px;
	margin: 30px 40px;
	display: block;
}
.card .container h5, h6 {
	text-align: center;
	color: grey;
}
.card .container h5 {
	color: black;
}

.card .card-image {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 150px;
}
.card .card-image img {
	max-height: 100px;
}
.card .card-image img:hover {
	max-height: 90px;
	transition: 0.3s;
}

.card .container {
	max-height: 100px;
}

    </style>

  <body>
    <nav>
      <li class="active">
      <div class="sub-menu-1">
           <ul>
               <li><a href="booking_history.php">Booking History</a></li>
               <li><a href="tourist_profile.php">profile</a></li>
               <li><a href="logout.php">Logout</a></li>
               <li><p><?php
               header('Cache-Control: no cache');
             session_cache_limiter('private_no_expire');
                             session_start();
                             echo "Welcome " .$_SESSION["emailID"];
                      ?>
                   </p></li>
           </ul>
       </div>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">TouristGuide</label>

    </nav>




<?php
  include 'connections.php';


  $search_city = "*";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_city = mysqli_real_escape_string($conn,$_POST['search_text']);

    $city_query = 'SELECT * FROM city WHERE (city_name LIKE "%'.$search_city.
    '%") ';
    $city_result = mysqli_query($conn, $city_query);
  }
  else {
    $city_query = 'SELECT * FROM city';
    $city_result = mysqli_query($conn, $city_query);
  }



 ?>
<html>

   <head>
      <title>Home</title>
   </head>

   <body onload="myFunction()" style="margin:0">


     <div class="wrapper" style="min-height: 100vh">

       <div>
         <h4 class="subtitle">city [ <?php
                   if ($search_city == "*" || $search_city == "") {
                     echo "All ]";
                   }else {
                     echo $search_city . ' ]';
                   }
                 ?></h4><hr class="divider">
       </div>

       <form class="topnav" action="" method="post">

         <div class="search-box">
           <input type="text" placeholder="Search.." name="search_text">
           <!-- <button type="submit" name="submit"></button> -->
           <button type="submit" style="border: 0; background: transparent; cursor: pointer">
             <img src="images/search.svg" width="20px" height="20px" alt="submit" />
           </button>
         </div>

       </form>

      <div id="loader"></div>

       <div class="feature-package  animate-bottom" id="myDiv" style="display: none">

         <?php
         if (mysqli_num_rows($city_result) > 0 ) {
           while ($row1 = mysqli_fetch_assoc($city_result)) {
             echo '<div class="card">
                  <a href="hotel_package.php?id='.$row1['city_id'].'" style="text-decoration: none">
                 <div class="card-image"><img src="images/'.$row1['city_image'].'" height="120" width="240"></div>
                 <div class="container">
                   <h5><b>'.$row1['city_name'].'</b></h5>
                 </div></a>
                 </div>';



           }
         }
         else {
           echo '<h4>No Results Found</h4>';
         }

        ?>
       </div>
     </div>


      <script>
        var myVar;

        function myFunction() {
          myVar = setTimeout(showPage, 500);
        }

          function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("myDiv").style.display = "flex";
        }
      </script>

   </body>

</html>
<?php include 'footer.php'; ?>
