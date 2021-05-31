<?php
    session_start();
    //print_r($_SESSION);

    //unset($_SESSION['email']);//remove se existir

    session_destroy();
    header('Location: index.php');
    //print_r($_SESSION);
?>