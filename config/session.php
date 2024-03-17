<?php
  if (session_status() != PHP_SESSION_ACTIVE) {
       session_start();  
    }

  if (!isset($_SESSION['userrole'])) { // new user enter site, userrole not set so it will be set to anonym
       $_SESSION['userrole'] = "anonym";
    }
?>

