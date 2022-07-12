<?php include 'header1.php'; ?>

<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.offer {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;

}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">OFFERS</h2>

<div class="card">
  <img src="images/first.jpg" alt="offer" style="width:100%">
  <h1>1st customer</h1>
  <p class="offer">15% off</p>
  <p>Our new customer will get 15% discount on their 1st tour</p>
  <p><a href="tourist_signup.php"><button>Book now</button></p>
</div>

</body>
</html>
