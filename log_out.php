<?php
session_start();




if(isset($_SESSION['user'])){
    unset($_SESSION['user']);

    echo '<script> window.location.href = "index.php" ; </script>';

    die();
}