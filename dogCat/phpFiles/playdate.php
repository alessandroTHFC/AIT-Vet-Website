<?php
include "connect.php";
session_start();

if (isset($_POST['type']))
{   
    $choice = $_POST['type'];
}

if($choice == 'breed')
    $querry1 = "SELECT First_Name, Pet_Name, PhoneNumber FROM users
    WHERE Pet_Breed = '{$_SESSION['animalType']}' && PhoneNumber != '{$_SESSION["phone"]}'";

else if($choice == 'gender')
    $querry1 = "SELECT First_Name, Pet_Name, PhoneNumber FROM users
    WHERE Pet_Gender = '{$_SESSION['animalGender']}' && PhoneNumber != '{$_SESSION["phone"]}'";
else
    $querry1 = "SELECT First_Name, Pet_Name, PhoneNumber FROM users
    WHERE Pet_Age = '{$_SESSION['animalAge']}' && PhoneNumber != '{$_SESSION["phone"]}'";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$result = mysqli_query($conn, $querry1);
if($result) {
    echo "<script type = text/javascript>alert('Success'); </script>";
}       
else
    echo "<script type = 'text/javascript'>alert('Failure'); </t>";    
mysqli_close($conn);
header("Location: http://localhost/home.html#pDateForm");

?>