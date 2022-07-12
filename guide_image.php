<?php
session_start();
require 'connections.php';

if(isset($_FILES['guide_image'])){

  $guide_email=$_SESSION['emailID'];
  $sqll ="SELECT guide_id
          FROM guide
          WHERE guide_email='$guide_email'";
  $guide=mysqli_query($conn,$sqll);
  $row = mysqli_fetch_array($guide);
  $guide_id= max($row);


  $guide_image=$_FILES['guide_image']['name'];
  $tmp_name=$_FILES['guide_image']['tmp_name'];
  $error=$_FILES['guide_image']['error'];

  $img_ex=pathinfo($guide_image,PATHINFO_EXTENSION);
  $img_ex_lc=strtolower($img_ex);
  $allowed_exs= array("jpg","jpeg","png");
  if (in_array($img_ex_lc, $allowed_exs)) {
				$img_upload_path = "images/".$guide_image;
				move_uploaded_file($tmp_name, $img_upload_path);
    $sql="UPDATE guide
          SET guide_image = '$guide_image'
          WHERE guide_id = '$guide_id'";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
      echo "<script>
             alert('Your photo has been uploaded!')
             window.location.href= 'guide_profile.php'
            </script>";
    }

    else {
      echo "Failed";
    }
  }

  else {
    echo "<script>
           alert('You have uploaded wrong file type!')
           window.location.href= 'guide_edit_profile.php'
          </script>";
  }

}
