<?php 
    require_once("../src/main/Vendor/Gestion/Auth.php");
    use \Vendor\Gestion\Auth;

    session_start();
    if(!Auth::isLogged()){
        header("Location: login.php");
    } 
?>