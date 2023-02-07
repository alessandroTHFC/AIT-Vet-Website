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
<body class="aboutBody" onload="setProfileImage()">
    <?php 
    include "phpFiles/connect.php";
        session_start(); 


// DATE AND TIME PICKER 
// This section occurs after user clicks button to send invite to potential playdate
// once the button is clicked on the potential playdate, the file getEmail is actioned 
// that will save the details of invitee into session variable and also make session variable 'emailSet'
// equal to one, upon reloading the page, there is the below if statement to see the value of emailSet, if it has been to the getEmail
// file it will be true and based on that the date time picker will appear. 
        if(isset($_SESSION['emailSet'])) {
            if($_SESSION['emailSet'] == 1) {
    ?>
        <div class="dateTimeForm" id="dtPicker">
            <form action="phpFiles/invite.php" class="dtContainer" method="post">
                <h1>Choose Date & Time</h1>
                <input class="dtChildren" type="datetime-local" name="eventDT" required/>
                <button type="submit" class="dtChildren" name="saveDT" onclick="window.open('mailto:<?php echo $_SESSION['invitedEmail'];?>?subject=Invitation for a Puppy Play Date&body=Hi <?php echo $_SESSION['invitedName'];?>!%0D%0A%0D%0AYour dog has recieved an invitation to play! Please login to your account to your invitations (http://localhost/dogCat/homepage.php).%0D%0A%0D%0ASincerely,%0D%0AProHealth Vets');">Send Email</button>
            </form>
            <button class="dtChildren" onclick="window.open('mailto:<?php echo $_SESSION['invitedEmail'];?>?subject=Invitation for a Puppy Play Date&body=Hi <?php echo $_SESSION['invitedName'];?>!%0D%0A%0D%0AYour dog has recieved an invitation to play! Please login to your account to view your invitations (http://localhost/dogCat/homepage.php).%0D%0A%0D%0ASincerely,%0D%0AProHealth Vets');"></button>
        </div>
            
    <?php
        }
    }
        $_SESSION['emailSet'] = 0;
    ?> 
    <!----------------------------------------------
      ---------------------------------------------
      ----------------------------------------------
      ----------------------------------------------
      -------------Top Menu----------------------->

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
        <h3>Search for other dogs of either the same Breed, Gender or Age.</h3>

        <form id="pDateForm" class="playDateForm" method="post">
          <select name="type">
            <option value="gender">Gender</option>
            <option value="breed">Breed</option>
            <option value="age">Age</option>
          </select>
          <input id="playDateBtn" type="submit" value="submit"/>
        </form>
        <?php
        
            if (isset($_POST['type']))
            {   
                $choice = $_POST['type'];

                if($choice == 'breed')
                    $querry1 = "SELECT First_Name, Pet_Name, PhoneNumber, Email FROM users
                                WHERE Pet_Breed = '{$_SESSION['animalType']}' && PhoneNumber != '{$_SESSION["phone"]}'";
        
                else if($choice == 'gender')
                    $querry1 = "SELECT First_Name, Pet_Name, PhoneNumber, Email FROM users
                                WHERE Pet_Gender = '{$_SESSION['animalGender']}' && PhoneNumber != '{$_SESSION["phone"]}'";
                else
                    $querry1 = "SELECT First_Name, Pet_Name, PhoneNumber, Email FROM users
                                WHERE Pet_Age = '{$_SESSION['animalAge']}' && PhoneNumber != '{$_SESSION["phone"]}'";

                $result = mysqli_query($conn, $querry1);
                if(!$result) {
                    echo "<script type = text/javascript>alert('Failed Query'); </script>";
                    mysqli_close($conn); 
                }       
            }
        ?>
        <div class="tableBox">
            <table class="table">
                <tr>
                <th colspan="2" class="tableHeader">Matches</th>
                </tr>
                <?php
                if(isset($result)){
                    while ($rows=mysqli_fetch_assoc($result)) {
        
                ?>
                <!-- This form will send details to getEmail.php to save the name and email of invitee of person to session variables, to be accessed later -->
                <form method="post" action="phpFiles/getEmail.php">
                    <tr>
                        <td class="matchtable"><?php echo $rows['First_Name'];?>'s dog <?php echo $rows['Pet_Name'];?>
                        <td class="matchtable"><input type="submit" id="playDateBtn" onclick="openDTPicker()" value="Invite For A Play" name="playDateBtn"></input>
                        <td class="matchtable"><input id="inviteeid" type="hidden" name="id" value="<?php echo $rows['Email'];?>">
                        <td class="matchtable"><input id="inviteeName" type="hidden" name="invitee_Name" value="<?php echo $rows['First_Name'];?>">
                        <td class="matchtable"><input id="inviteeName" type="hidden" name="invitee_Ph" value="<?php echo $rows['PhoneNumber'];?>">
                    </tr>
                </form>
                <?php
                    }
                }
                ?>
            </table>
           </div>
        </div>
        
      <div class="playDateImg">
        <img src="imgs/playdate.jpg" alt="">
      </div>


    </div>
    
<!---- Invites Inbox Area ----->
<!-- ----------------------- -->
<?php
    $inviterQuery = "SELECT Invitee_Name, Invitee_Phone, Invitee_Email, Play_dateTime,
                            Response FROM playdates WHERE Inviter_Name = '{$_SESSION['name']}'";
                        
    $inviteeQuery = "SELECT ID, Inviter_Name, Inviter_Phone, Invitee_Phone, Play_dateTime, 
                            Response FROM playdates WHERE Invitee_Name = '{$_SESSION['name']}'" ;                   
?>

    <div class="inviteArea">
        <div class="invitedArea">
            <h1>Your Sent Invites</h1>
            <?php
                $query1 = mysqli_query($conn, $inviterQuery);
                if(!$query1) {
                    echo "<script type = text/javascript>alert('Failed Query'); </script>";
                    mysqli_close($conn); 
                }  
            ?>

            <table class="invitedTable">
                <tr>
                    <th>Invited</th>
                    <th>When</th>
                    <th>Response</th>
                </tr>
                <?php
                 if(isset($query1)){
                    while($rows = mysqli_fetch_assoc($query1)) {
                ?>
                    <tr>
                        <td class="tableData"><?php echo $rows['Invitee_Name'];?> </td>
                        <td class="tableData"><?php echo $rows['Play_dateTime'];?> </td>
                        <!-- If Response is either No Reply or Declined will say No Reply -->
                        <!-- So the person doesnt know theyve been rejected -->
                    <?php
                            if($rows['Response'] == 'No Reply' || $rows['Response'] == 'Declined') {
                    ?>
                        <td class="tableData">No Reply</td>
                    <?php
                    // Otherwise if not no reply or declined aka accepted, will show the invitees ph Number
                        } else {
                    ?>
                         <td class="tableData"><?php echo $rows['Invitee_Phone'];?> </td>
                    </tr>

                <?php
                        }   
                    }
                 }
                ?>
            </table>

        </div>

        <div class="invitedArea">
            <h1>Your Recieved Invites</h1>
            <?php
                $query2 = mysqli_query($conn, $inviteeQuery);
                if(!$query2) {
                    echo "<script type = text/javascript>alert('Failed Query'); </script>";
                    mysqli_close($conn); 
                }  
            ?>
                <table class="invitedTable">
                    <tr>
                        <th>Invited By</th>
                        <th>When</th>
                        <th>Response</th>
                    </tr>
                    <?php
                    if(isset($query2)){
                        while($rows = mysqli_fetch_assoc($query2)) {
                        $_SESSION['invite_counter'] = 0;
                        $_SESSION['invite_counter']++;
                    ?>
                    <form action="phpFiles/response.php" method="post">
                        <tr>
                        <td class="tableData"><?php echo $rows['Inviter_Name'];?> </td>
                        <td class="tableData"><?php echo $rows['Play_dateTime'];?> </td>
                        <input id="inviteeName" type="hidden" name="inviter_id" value="<?php echo $rows['ID'];?>">
                       <!--  -->
                        <!-- if reponse is No reply will place two buttons to accept or decline -->
                        <?php
                            if($rows['Response'] == 'No Reply') {
                        ?>


                            <td class="tableData">
                            <input type="submit" name="accept" id="res" value="Y">
                            <input type="submit" name="decline" id="res" value="N">


                        <?php
                            } else if($rows['Response'] == 'Accepted') {
                        ?>


                        <!-- ================================================ -->
                        <!-- if response is accepted will show the inviters ph number -->
                            <td class="tableData"><?php echo $rows['Invitee_Phone'];?> </td>


                        <?php
                            } else {
                        ?>


                         <!-- ================================================ -->
                        <!-- Final potential option is if the response is Declined in which case will show you invites you've declined -->
                            <td class="tableData">Declined
                            <input type="submit" name="delete" id="res" value="Delete"></td>


                        <?php
                            } 
                        ?>
                        </tr>
                    </form>
                    <?php
                        } //while loop closing brace
                    }  //closing brace from isset at the top
                    ?>
                </table>
        </div>
    </div>

    <?php
	
	$query3 = "DELETE from playdates WHERE Date_created > NOW() - INTERVAL 7 DAY";
	if (!mysqli_query($conn, $query3)) {
	  echo '<script>console.log("Removal of records unsuccessful");</script>';
	} else {
	  echo '<script>console.log("Record check successful"); </script>';
	}
    ?>


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