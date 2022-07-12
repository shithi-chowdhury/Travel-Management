<?php
session_start();
require 'connections.php';

if(isset($_FILES['tourist_image'])){

  $tourist_email=$_SESSION['emailID'];
  $sqll ="SELECT tourist_id
          FROM tourist
          WHERE tourist_email='$tourist_email'";
  $tourist=mysqli_query($conn,$sqll);
  $row = mysqli_fetch_array($tourist);
  $tourist_id= max($row);


  $tourist_image=$_FILES['tourist_image']['name'];
  $tmp_name=$_FILES['tourist_image']['tmp_name'];
  $error=$_FILES['tourist_image']['error'];

  $img_ex=pathinfo($tourist_image,PATHINFO_EXTENSION);
  $img_ex_lc=strtolower($img_ex);
  $allowed_exs= array("jpg","jpeg","png");
  if (in_array($img_ex_lc, $allowed_exs)) {
				$img_upload_path = "images/".$tourist_image;
				move_uploaded_file($tmp_name, $img_upload_path);
    $sql="UPDATE tourist
          SET tourist_image = '$tourist_image'
          WHERE tourist_id = '$tourist_id'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
      echo "<script>
             alert('Your photo has been uploaded!')
             window.location.href= 'tourist_profile.php'
            </script>";
    }

    else {
      echo "Failed";
    }
  }

  else {
    echo "<script>
           alert('You have uploaded wrong file type!')
           window.location.href= 'edit_profile.php'
          </script>";
  }

}
