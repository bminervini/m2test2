<?php 
    if(isset($_SESSION['isAdmin'])){
        if($_SESSION['isAdmin'] == 0){
            header("Location: dashboard.php");    
        }
    }else{
        header("location: dashboard.php");
    }
?>