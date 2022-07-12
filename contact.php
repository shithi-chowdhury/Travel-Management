<?php include 'header1.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}
h2 {
  text-shadow: 2px 1px;
}
.column {
  float: left;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 30px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 12px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>Our Team</h1>
</div>
<div class="column">
  <div class="card">
    <img src="images/o3.jpg" alt="s" style="width:100%">
    <div class="container">
      <h2>Soumik sarkar</h2>
      <p class="title">OWNER</p>
      <p>soumik@northsouth.edu</p>
    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="images/o4.jpg" alt="s" style="width:100%">
      <div class="container">
        <h2>Shithi Chowdhury</h2>
        <p class="title">OWNER</p>
        <p>shithi.chowdhury@northsouth.edu</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/o1.jpg" alt="s" style="width:100%">
      <div class="container">
        <h2>Likhon Saha</h2>
        <p class="title">OWNER</p>
        <p>likhon.saha@northsouth.edu</p>
      </div>
    </div>
  </div>



<div class="column">
  <div class="card">
    <img src="images/o2.jpg" alt="s" style="width:100%">
    <div class="container">
      <h2>Riana</h2>
      <p class="title">OWNER</p>
      <p>riana@gmail.com</p>
    </div>
  </div>
</div>
</div>


</body>
</html>
<?php include 'footer.php'; ?>
