<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/5adeb8d2bc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Poppins:wght@100;200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:wght@700&display=swap" rel="stylesheet">    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ProHealth Vet</title>
</head>

<body class="homeBody" onload="setProfileImage()">
  <?php session_start(); ?> 

      <!--------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------Top Menu----------------------->
    <div class="topMenu">
        <img class="hBurger" src="imgs/hamburger.png" alt="" onclick="popOutMenu()">
        <img class="logo" src="imgs/logo.png">
        <h1> ProHealth Vet</h1>
        <div class="topButtonBox">
            <button onclick="openRegForm()">Sign Up</button>
            <button onclick="openLoginForm()">Log In</button>
            
        </div>
        <h2 id="userAnimalPreference">User is Animal Lover</h2>
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
        <form action="registration.php" method="post" class="form-container">
          <h1>Sign Up</h1>
          <div class="left">
            <label for="fName"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fName" required>
        
            <label for="lName"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lName" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Last Name" name="pWord" required>
        
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
      <form action="login.php" class="form-container" method="post">
        <h1>Login</h1>
        <label for="email"><b></b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
    
        <label for="psw"><b></b></label>
        <input type="text" placeholder="Enter Pet Name" name="pName" required>
    
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
        <a href="home.html">Home</a>
        <a href="services.html">Services</a>
        <a href="bio.html">About Us</a>
        <a href="location.html">Location</a>
    </nav>

      <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------Top Parallax Div------------------>

    <div class="para1">
        <div class="cover"></div>

        <div id="para1TextBox">
            <h2>G'day <span id="clientName"> User</span> welcome to ProHealth Vet</h2>
            <button>Call Us</button>
            <button>Book Appointment</button>
            </div>
    </div>

    <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------Middle Section Slider------------>

    <div class="homeTextArea">
        
        <div class="slider">
            <div class="slide active">
              <img id="pic1" src="caroImgs/img1.jpg" alt="">
            </div>
            <div class="slide">
              <img id="pic2" src="caroImgs/img2.jpg" alt="">
            </div>
            <div class="slide">
              <img id="pic3" src="caroImgs/img3.jpg" alt="">
            </div>
            <div class="slide">
              <img id="pic4" src="caroImgs/img4.jpg" alt="">
            </div>
            <div class="navigation">
              <i class="fas fa-chevron-left prev-btn" ></i>
              <i class="fas fa-chevron-right next-btn"></i>
            </div>
            <div class="navigation-visibility">
              <div class="slide-icon active"></div>
              <div class="slide-icon"></div>
              <div class="slide-icon"></div>
              <div class="slide-icon"></div>
            </div>
          </div>

    </div>

        <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------Bottom Section Testimonials----------------------->

    <div class="para2">
       <div class="cover2"></div>
          
        <div class="testimonial">
            <img src="imgs/catSmoking.jpg.crdownload" alt="">
            <h1>John</h1>
            <div class="testTextBox">
            <h3>As a pack a day smoker my lungs arent the best, after a few herbal remedies and excercise plans I'm fitter than ever.</h3>
             <h3> I wouldn't be where I am today without the team at ProHealth.</h3>
            </div>
        </div>

        <div class="testimonial">
          <img src="imgs/dogHat.jpg" alt="">
          <h1>Michelle</h1>
          <div class="testTextBox">
          <h3>I always had a cold head, thanks to ProHealth and the beanie they gave me I'm constantly warm.</h3>
          <h3>Special thanks to Dr Phil who reccomended it.</h3>
          </div>
        </div>

        <div class="testimonial">
          <img src="imgs/alpacca.jpg" alt="">
            <h1>Alfonso</h1>
            <div class="testTextBox">
              <h3>I constantly had diarrhea because of my high fibre diet, because of ProHealth and their dieticians I'm regular but solid</h3>
              <h3>I can't reccomend these guys enough, thanks ProHealth.</h3>
            </div>
        </div>
    </div>


          
<!----------------------------------------------
---------------------------------------------
----------------------------------------------
----------------------------------------------
-------------PuppyPlayDates----------------------->

    <div class="playDateHeading">
      <h1>ProHealth Puppy Play Dates</h1>
    </div>

   <div class="puppyPlayDate">

      <div class="playDateText">
        <h3>ProHealth Offers its members the ability to organise play dates, <span> doggystyle! </span></h3>
        <h3>Search for other dogs of either the same Breed, Gender or Locality.</h3>

        <form id="pDateForm" class="playDateForm" action="playdate.php" method="post">
          <select name="type">
            <option value="gender">Gender</option>
            <option value="breed">Breed</option>
            <option value="suburb">Suburb</option>
          </select>
          <input id="playDateBtn" type="submit" value="submit"/>
        </form>
      </div>

      <div class="playDateImg">
        <img src="imgs/playdate.jpg" alt="">
      </div>

    </div>

        <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------Footer----------------------->

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


    <script src="functionality.js"></script>
</body>
</html>