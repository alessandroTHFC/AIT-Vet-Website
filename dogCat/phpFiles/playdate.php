<?php
include "connect.php";


if (isset($_POST['type']))
{   
    $choice = $_POST['type'];
}

echo $choice;

$querry1 = "INSERT INTO users (First_Name) VALUES ('$choice')";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(mysqli_query($conn, $querry1)) {
    echo "<script type = text/javascript>alert('Success'); </script>";
}       
else
    echo "<script type = 'text/javascript'>alert('Failure'); </script>";    
mysqli_close($conn);
header("Location: http://localhost/home.html#pDateForm");

?>