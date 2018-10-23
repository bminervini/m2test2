<?php 
    if(isset($_SESSION['isAdmin'])){
        if($_SESSION['isAdmin'] == 0){
            header("Location: login.php");    
        }
    }else{
        header("location: login.php");
    }
?>