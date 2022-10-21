<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vetDataBase";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if(!$conn)
{
    die("connection Failed: " . mysqli_connect_error());
}          