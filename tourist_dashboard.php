<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tourist_dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <li class="active">
      <div class="sub-menu-1">
           <ul>
               <li><a href="profile.php">profile</a></li>
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
  include 'connections.php';
  header('Cache-Control: no cache');


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


     <div class="wrapper" style="min-height: 90vh">

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
                 <div class="card-image"><img src="images/'.$row1['city_image'].'" height="100" width="200"></div>
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
