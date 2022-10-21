<?php 
include "connect.php";

if (isset($_POST['fname']) || isset($_POST['lName']) || isset($_POST['num']) || isset($_POST['email']) || isset($_POST['suburb']) || isset($_POST['postCode']) || isset($_POST['pName']) || isset($_POST['pBreed']) || isset($_POST['pAge']) || isset($_POST['pGender']))
 {
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $phoneNumber = $_POST['num'];
            $email = $_POST['email'];
            $suburb = $_POST['suburb'];
            $postCode = $_POST['postCode'];
            $petName = $_POST['pName'];
            $petBreed = $_POST['pBreed'];
            $petAge = $_POST['pAge'];
            $petGender = $_POST['pGender'];
            $petPic = $_POST['pPic'];
}
else
    echo "<script type = text/javascript>alert('Fucked'); </script>";


$querry1 = "INSERT INTO users (First_Name, Last_Name, Email, Suburb, Post_Code, Pet_Name, Pet_Breed, Pet_Age, Pet_Gender, Pet_Photo, phoneNumber) VALUES ('$fName', '$lName','$email', '$suburb', '$postCode', '$petName', '$petBreed', '$petAge', '$petGender', '$petPic', '$phoneNumber')";

if(mysqli_query($conn, $querry1)) {
    echo "<script type = text/javascript>alert('Success'); </script>";
}       
else
    echo "<script type = 'text/javascript'>alert('Failure'); </script>";    
mysqli_close($conn);

header("Location: http://localhost/dogCat/home.html#animalImg");
?>