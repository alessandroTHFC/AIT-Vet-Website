<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/5adeb8d2bc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Poppins:wght@100;200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:wght@700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="style.css">
    <script src="functionality.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProHealth Vet</title>
</head>
<body class="locationBody" onload="setProfileImage()">
<?php session_start(); ?> 
    
<div class="topMenu">
        <img class="hBurger" src="imgs/hamburger.png" alt="" onclick="popOutMenu()">
        <img class="logo" src="imgs/logo.png">
        <h1> ProHealth Vet</h1>
        
        <div class="topButtonBox">
            <?php if(isset($_SESSION['user_login_status']) == 1) {
              
              echo '<a href="phpFiles/logout.php"><button id="logoutBtn">Log Out</button></a>';
            } else {
              echo '<button onclick="openLoginForm()">Log In</button>';
              echo '<button onclick="openRegForm()">Sign Up</button>';
            } ?>
        </div>

          <h2 id="userAnimalPreference">
            <?php 
              if(isset($_SESSION['name'])) {
                echo $_SESSION['name'] . " is logged in: " . $_SESSION['animalType'] . " Lover";
              } else {
                echo "User is an Animal Lover";
              } ?> 
          </h2>

          <img id="animalImg" src="" alt="">
        </div>
    <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------SIGN UP FORM----------------------->
    <div class="popUpContainer" id="myForm">
      <i class="fas fa-times" onclick="closeRegForm()"></i>
      <div class="popUpForm">
        <form action="phpFiles/registration.php" method="post" class="form-container">
          <h1>Sign Up</h1>
          <div class="left">
            <label for="fName"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fName" required>
        
            <label for="lName"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lName" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pWord" required>
        
            <label for="num"><b>Phone Number</b></label>
            <input type="number" placeholder="Enter Phone Number" name="num" required>
  
            <label for="email"><b>Email Address</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
  
            <label for="suburb"><b>Suburb</b></label>
            <input id="suburb" type="text" placeholder="Enter Suburb" name="suburb" required>

            <label for="pCode"><b>Post Code</b></label>
            <input id="postcode" type="number" placeholder="Enter Suburb" name="postCode" required>
          </div>

          <div class="right">

            <label for="pName"><b>Pet Name</b></label>
            <input type="text" placeholder="Enter Pets Name" name="pName" required>
  
            <label for="pBreed"><b>Pet Breed</b></label>
            <input type="text" placeholder="Enter Pet Breed" name="pBreed" required>
  
            <label for="pAge"><b>Pets Age</b></label>
            <input type="number" placeholder="Enter Pets Age" name="pAge" required>
  
            <label for="pGender"><b>Pets Gender</b></label>
            <input type="text" placeholder="Enter Pets Gender" name="pGender" required>
  
            <label for="pImage"><b>Pet Photo</b></label>
            <input id="imageInput" type="file" placeholder="Upload Pet Photo" name="pPic">
  

          </div>
          <button type="submit" id="closeBtn" onclick="closeRegForm()">Sign Up</button>
          
        </form>
      </div>
    </div>

        <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------LOGIN FORM---------------->

    <div class="loginForm" id="myLogin">
      <form action="phpFiles/login.php" class="form-container" method="post">
        <h1>Login</h1>
        <label for="email"><b></b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
    
        <label for="psw"><b></b></label>
        <input type="password" placeholder="Enter Password" name="pWord" required>
    
        <button type="submit" class="btn">Login</button>
        <button type="button" class="btn cancel" onclick="closeLoginForm()">Close</button>
      </form>
    </div>


    <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------Side Navigation----------------->
    <!---change font? also change styling underline to match service boxes-->
    <nav id="navID" onclick="closeMenu()">
            <?php if(isset($_SESSION['user_login_status']) == 1) {
             echo "<h2 id='loginName'>" . $_SESSION['name'] . " is logged in </h2>"; 
            } 
            ?>
        <a href="home.php">Home</a>
        <a href="services.php">Services</a>
        <a href="bio.php">About Us</a>
        <a href="location.php">Location</a>
    </nav>



    <div class="headingBox">
        <h1>Our Location</h1>
    </div>

    <div class="mainLocation">
        <div class="mapDiv">
            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=adelaide+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
            </iframe>
        </div>
        <div class="contactBox" >
            <h1>Address</h1>
            <h3>752 Evergreen Tce, Springfield 4023</h3>
            <h1 id="openingH">Opening Hours</h1>
            <h3>Monday-Friday</h3>
            <h3>8:30am to 6pm</h3>
            <h3>Holidays/Weekends from 9am-3pm</h3>
        </div>
        <div class="contactBox">
            <h1>Phone Number</h1>
            <h3> (08) 8269 2545</h3>
            <h1>Email</h1>
            <h3> prohealthvet@hotmail.com</h3>
            <div class="socialBox">
                <h1>Contact Us Via The Socials</h1>
                <a href="#">
                    <i class="fab fa-instagram-square"></i>
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>

        </div>
    </div>
    <div class="inputFormBox">
        <h1>Contact Us Directly</h1>
        <form>      
            <input name="name" type="text" class="feedback-input" placeholder="Name" />   
            <input name="email" type="text" class="feedback-input" placeholder="Email" />
            <textarea name="text" class="feedback-input" placeholder="Comment"></textarea>
            <input class="submitBtn" type="submit" value="SUBMIT"/>
          </form>
    </div>

    <div class="footer">
        <div class="contact">
            <div class="contactIcon">
                <i class="fas fa-phone"></i>
                <i class="fas fa-envelope"></i>
                <i class="fas fa-map-marker"></i>

            </div>

            <div class="contactText">
                <a href="#"><h3> (08) 8269 2545</h3></a>
                <a href="#"><h3> prohealthvet@hotmail.com</h3></a>
                <h3> 742 Evergreen Tce, Springfield, 4023</h3>
            </div>
        </div>

        <div class="hours">
            <h3>Working Hours</h3>
            <h4>Monday-Friday</h4>
            <h4>Open from 8:30am-6pm</h4>
            <h4>Holidays/Weekends from 9am-3pm</h4>

        </div>

        <div class="socials">
            <a href="#">
                <i class="fab fa-instagram-square"></i>
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-linkedin"></i>
            </a>
        </div>

    </div>

</body>
</html>