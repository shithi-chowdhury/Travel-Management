------------------------------------
 	  Header 
------------------------------------

There are multiple headers in our project,
only front page has a unique header,



-----------------------------------
 	  Register Page
-----------------------------------
we have 3 Register pages
1. tourist
2. Guide
3. restaurant
This page contains a basic registration form where all inputs are required.
After registration, this is how the information gets saved in the database:
- The email and password are inserted in 'tourist' table for tourist,
 guide table for guide and restaurant table for restaurant.



----------------------------------
 	  Login Session
----------------------------------

Every file will call the connections.php file. 
Session checks whether a user is logged in or not, so it can start the session.
 So, this file will return
the email that has logged in, in a string called $user_email.
For Example, suppose shithi@gmail.com has logged in. This email is saved as 
$user_email = "shithi@gmail.com" so you can use it any way you want for queries.
If email is not found, session will redirect us to sign in page.
There is also a logout file which simply destroys the session.




----------------------
	footer
----------------------
every page of this website has same footer. (footer.php)




===============================================================
	tourist
===============================================================


------------------
   Welcome Page
-------------------

After successful login, user is redirected to 'tourist_dashboard.php' page.
This page shows us a different header file with some features.
All city is listed here and the user can browse or choose any of them.
There is a search box to search for any particular destination. 
(The search box searches name of city of the package)



------------------
   Package Details
-------------------

The user selects a package and is redirected to this page (hotel_booking.php) via GET method.
All available information about this particular tour package is enlisted here.
(Since the url shows the id of the package, anyone can change it to view some other package.
Any package with invalid id will redirect to Error page 404.php.

Once the "Book Now!" button is clicked, the user will be redirected another page for booking.


------------------
   Booking Page
------------------

This Page will be accessed after selecting a package.
Here all information regarding the trip will be finalized.
Hotels and Transportation Systems will be suggested here.
For Example, if the user selects a tour package to Chittagong, 
all transports (Air, Water or Bus)
from Dhaka to Chittagong will be enlisted.


-----------------
	payment page
-----------------
in this page you have to pay 30% of total amount by bkash, if you are 1st customer then you will get 15% discount.



---------------
	booking history page
--------------------
here tourist can view there booking history. Via get method


-------------------
	profile page
-----------------
in this page tourist can view their personal info which they give during signup except password.
 they can edit their information and also can upload their photo; they can change their password via post method
and also, can delete their profile. after deleting their profile, they have to sign up again for booking.


-------------------
	Restaurant page
-----------------
When tourists select any city, they will be able to see an option named 'Restaurant' in the navbar. 
If they click this option, 
they will be redirected to restaurant page, 
where they can see a list of restaurants situated in the selected city.



-------------------
	Restaurant details page
-----------------
In the restaurant page, tourists can select any restaurant they like.
 After clicking 'See details' button, they will be
redirected to restaurant details page. In this page, 
tourists can see restaurant name, address, phone number, email address,
about, food image, food name, cost and description.







================================================
	Guide
================================================

--------------------
	Guide dashboard
--------------------
When a guide logs in his/her account, that guide will be redirected in this page.
 After booking a package by tourist, 
details about the package along with tourist information will be shown in this page.
 Here guides can see tourists' hotel, 
contact info, package name, places to be visited, payment status and amount etc.
 In the navbar, there are options like profile
and logout.






----------------
	Guide profile
----------------
In this page guide can view their personal info which they give during signup except password.
they can edit their information and also can upload their photo, they can change their password,
and also, can delete their page.










=========================================================
	Restaurant
=========================================================

------------------------
	Restaurant dashboard
-------------------------
After logging in as restaurant manager, they will be redirected in this page. If they able to perform
successful food enlistment, these food details such as food name, image, cost and description will be
shown in this page. In the navbar there is option named 'Add food'.






------------------------
	Add food 
------------------------
If any restaurant manager wants to enlist any food, he/she will have to click this option. After redirecting
to this page, restaurant managers have to provide details like food name, image, cost and description. Then they
will have to click 'Enlist'. If all the informations are provided, food details will be enlisted.