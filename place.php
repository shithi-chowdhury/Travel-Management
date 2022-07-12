
<?php include 'header1.php'; ?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
<body>

<h2 class="w3-center">Bangladesh is a land of “Natural Beauty”.Bangladesh's tourist attractions include historical monuments, resorts, beaches, picnic spots, forests and tribal people, wildlife of various species. </h2>

<div class="w3-content w3-display-container">
  <img class="mySlides" src="images/dhaka.jpg" style="width:100%">
  <img class="mySlides" src="images/barisaL.jpg" style="width:100%">
  <img class="mySlides" src="images/Kuakata.jpg" style="width:100%">
  <img class="mySlides" src="images/ahsan_manzil.jpg" style="width:100%">
<img class="mySlides" src="images/durga_sagar.jpg" style="width:100%">
<img class="mySlides" src="images/Rangamati.jpg" style="width:100%">
<img class="mySlides" src="images/rajbana_vihara.jpg" style="width:100%">
<img class="mySlides" src="images/prithavoge.jpg" style="width:100%">

  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>

</body>
</html>
<?php include 'footer.php'; ?>
