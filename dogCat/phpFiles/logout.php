<?php

    session_start();
    // delete the session of the user
    session_destroy();
    header("Location: http://localhost/dogCat/home.php#animalImg");
    exit();
?>