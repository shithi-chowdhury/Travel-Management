<?php include 'header1.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }

  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }

  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }

  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
</head>
<body>

<div class="timeline">
  <div class="container left">
    <div class="content">
      <h2>Signup</h2>
      <p>You have to signup with your name, phone number, address and password.</p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
      <h2>Login</h2>
      <p>Login with your email & password</p>
    </div>
  </div>
  <div class="container left">
    <div class="content">
      <h2>City</h2>
      <p>Choose city which city you want to travel, There is a search box to search for any particular destination.</p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
      <h2>package</h2>
      <p>After choosing city , you can able see all Packages  listed here and you can browse or choose any of them. </p>
    </div>
  </div>
  <div class="container left">
    <div class="content">
      <h2>Before booking </h2>
      <p>After choosing package you can see the information about this package like guide name , hotel name  etc and after that you can book that package.</p>
    </div>
  </div>

  <div class="container right">
    <div class="content">
      <h2>Booking</h2>
      <p>Here all information regarding the trip will be finalized.
 Transportation Systems will be suggested here.
For Example, if you selects a tour package to Chittagong,  All transports (Air, Water or Bus)
from Dhaka to Chittagong will be enlisted.you have to give total person and travel date.</p>
    </div>
  </div>


<div class="container left">
  <div class="content">
    <h2>Payment</h2>
    <p>Here you have to pay 30% of total amount</p>
  </div>
</div>


<div class="container right">
  <div class="content">
    <h2>Profile</h2>
    <p>Here you can edit your details , also you can delete your account</p>
  </div>
</div>



</div>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
