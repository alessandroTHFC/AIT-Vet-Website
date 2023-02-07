<?php 
session_start();
    if(isset($_POST["playDateBtn"])){
        if(isset($_POST['id']) || isset($_POST['invitee_Name'])) {

            $_SESSION["invitedEmail"] = $_POST['id'];
            $_SESSION["invitedName"] = $_POST["invitee_Name"];
            $_SESSION["invited_Ph"] = $_POST["invitee_Ph"];
            $_SESSION["emailSet"] = 1;
            header("Location: http://localhost/dogCat/pdate.php");
        }

    }

?>