<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "vetDataBase";

 $conn = mysqli_connect($host, $dbusername, $dbpassword);
 if (!$conn) {
   echo "The connection has failed";
 }
 else {
   $query = "CREATE DATABASE IF NOT EXISTS ". $dbname;
   if (!mysqli_query($conn, $query))
   {
     echo "Could not open the database" . mysqli_error($conn);
   }
   else
   {
     if (!mysqli_select_db($conn, $dbname))
     {
       echo '<script>console.log("Could not open the database") . mysqli_error($conn); </script>';
     }
     else
     {
     echo '<script>console.log("Database created successfully");</script>';
     $query = "CREATE TABLE IF NOT EXISTS users (
       First_Name VARCHAR(45) NOT NULL,
       Last_Name VARCHAR(45) NOT NULL,
       Email VARCHAR(255) NOT NULL,
       PhoneNumber CHAR(10) PRIMARY KEY NOT NULL,
       Email VARCHAR(45) NOT NULL,
       Suburb VARCHAR(45) NOT NULL,
       Post_Code INT(4) NOT NULL,
       Pet_Name VARCHAR(45) NOT NULL,
       Pet_Breed VARCHAR(45) NOT NULL,
       Pet_Age INT(2) NOT NULL,
       Pet_Gender VARCHAR(6) NOT NULL,
       Pet_Image VARCHAR(100) NOT NULL)";
       if (!mysqli_query($conn, $query))
       {
         echo '<script>console.log("user table query failed") . mysqli_error($conn);</script>';
       } else {
         echo '<script>console.log("user table exists or created successfully"); </script>';
       }
       $query2 = "CREATE TABLE IF NOT EXISTS playdates (
         ID int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
         Inviter_Name VARCHAR(45) NOT NULL,
         Inviter_Phone VARCHAR(13) NOT NULL,
         Inviter_PetName VARCHAR(45) NOT NULL,
         Play_dateTime VARCHAR(20) NOT NULL,
         Invitee_Name VARCHAR(45) NOT NULL,
         Invitee_Phone VARCHAR(13) NOT NULL,
         Invitee_Email VARCHAR(100) NOT NULL,
         Response VARCHAR(8),
         Date_created VARCHAR(10) NOT NULL)";
         if (!mysqli_query($conn, $query2)) {
             echo '<script>console.log("playdate table query failed") . mysqli_error($conn);</script>';
           } else {
             echo '<script>console.log("playdate table exists or created successfully"); </script>';
         }
     }
   }
 }
 ?>