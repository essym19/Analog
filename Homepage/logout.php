<?php
   
    $_SESSION =  $_SESSION["id"]; 
    session_destroy();
    header('location: homePage.php');
?>