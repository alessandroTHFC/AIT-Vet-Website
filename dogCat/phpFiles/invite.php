<?php 
    include "connect.php";
    session_start();
        if (isset($_POST['eventDT']) || isset($_SESSION['animalName'])) {
            $play_date = $_POST['eventDT'];
            $inviter = $_SESSION['name'];
            $inviter_no = $_SESSION['phone'];
            $inviter_PetName = $_SESSION['animalName'];
            $invitee_email = $_SESSION['invitedEmail'];
            $invitedName =  $_SESSION["invitedName"];
            $invitedPh = $_SESSION['invited_Ph'];
            $response = 'No Reply';
            $dateCreated = date('d-m-y');
            // header("Location: http://localhost/dogCat/pdate.php");
        }
        else {
            echo '<script>alert("Something not set!");</script>';
        }

        // 
        $query = "INSERT INTO playdates (Inviter_Name, Inviter_Phone, Inviter_PetName, Play_dateTime,
                                    Invitee_Name, Invitee_Phone, Invitee_Email, Response, Date_created)
                            VALUES ('$inviter', '$inviter_no', '$inviter_PetName' ,'$play_date', '$invitedName', '$invitedPh',
                                         '$invitee_email', '$response', '$dateCreated' )";
        // var_dump($query);
        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Success! Invitation Loaded to Database.");
            location.href= "http://localhost/dogCat/pdate.php"</script>';
        } else {
            echo '<script>alert("Error");</script>';
        }
?>  