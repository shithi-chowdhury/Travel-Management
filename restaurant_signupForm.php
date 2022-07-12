<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SignUp Form</title>
      <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="restaurant_signupForm.css">
  </head>
  <body>

    <form action="insert_restaurant_signupForm.php" method="POST">

      <h1>Sign Up as Restaurant Manager</h1>

      <fieldset>
        <legend><b>Please set your restaurant name, email and password</b></legend>
        <label for="restaurant_name"><b>Restaurant Name:</b></label>
        <input type="text" id="name" name="restaurant_name" required>

        <label for="email"><b>Restaurant Email:</b></label>
        <input type="email" id="mail" name="restaurant_email" placeholder="example@gmail.com" required>

        <label for="password"><b>Password:</b></label>
        <input type="password" id="password" name="restaurant_password" required>
      </fieldset>

      <fieldset>
        <legend><b>Please fill up these additional details</b></legend>
        <label for="description"><b>Description:</b></label>
        <textarea id="description" name="restaurant_description" placeholder="Please write something about your restaurant..."></textarea>
      </fieldset>
      <fieldset>
      <label for="city"><b>City:</b></label>
      <select id="city" name="city_id" required>
          <option value="" disabled selected>Choose your city</option>
          <option value="dhk">Dhaka</option>
          <option value="ctg">Chittagong</option>
          <option value="bar">Barisal</option>
          <option value="khl">Khulna</option>
          <option value="rng">Rangpur</option>
      </select>

      <label for="address"><b>Address:</b></label>
      <textarea id="address" name="restaurant_address" required></textarea>

      <label for="phone_number"><b>Phone Number:</b></label>
      <input type="tel" placeholder="01*********" name="restaurant_phone_number" pattern="[0]{1}[1]{1}[0-9]{3}[0-9]{6}" required>

      </fieldset>
      <button type="submit">Sign Up</button>
      <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </form>

  </body>
</html>
