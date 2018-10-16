<?php 
    require_once("../src/main/Vendor/Gestion/Auth.php");
    use \Vendor\Gestion\Auth;

    session_start();
    if(Auth::logout()){
        header("Location: login.php");
    } 
?>