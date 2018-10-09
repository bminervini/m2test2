<?php 
    require_once("Auth.php");
    use \Auth\Auth;
     
    if(Auth::isLogged()){
        header("Location: login.php");
    } 
?>