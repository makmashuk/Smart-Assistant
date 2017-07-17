<?php
    session_start();
    session_destroy();
    setcookie("loggedInUser", "", time()-1);
    //setcookie("user", $_SESSION['user'][0], time()-1);
    header("location:".ROOT);

?>