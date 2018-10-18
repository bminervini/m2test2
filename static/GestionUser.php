<?php 
    require_once("../src/main/Vendor/Gestion/GestionAdmin.php");

 
    $gestion = new \Vendor\Gestion\GestionAdmin();
    $res = $gestion->getAllInactiveUser();
    
?>

<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>
  
    <body class="cs_body">
        
        <?php include 'navbar.php';?>
        
        <div class="container">
            
            <?php
                while($donnees = mysql_fetch_array($res))
                {
                    echo "<p>".$donnees['nom']."</p>";
                }
            ?>
           
        </div>
        
        <?php include 'bottom.php';?>

    </body>
</html>