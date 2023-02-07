<?php 
    include "connect.php";
    session_start();

    if(isset($_POST['accept'])) {
        if(isset($_POST['inviter_id'])) {
            var_dump($_POST['inviter_id']);
            $query = "UPDATE playdates SET Response = 'Accepted' WHERE ID = {$_POST['inviter_id']}";
        }
        else {
            echo '<script>alert("Inviter ID not set");</script>';
        }
    } 
    else if(isset($_POST['decline'])) {
        $query = "UPDATE playdates SET Response = 'Declined' WHERE ID = {$_POST['inviter_id']}";
    }
    else if(isset($_POST['delete'])) {
        $query = "DELETE FROM playdates WHERE ID = {$_POST['inviter_id']}";
    }
    if (mysqli_query($conn, $query)) {
        header("Location: http://localhost/dogCat/pdate.php");
    }
    //TODO: WILL THE DELETE work if the input doesnt exist because invited isnt declined?!

    //TODO: 
?>