<?php 
    require_once("../src/main/Vendor/Gestion/GestionAdmin.php");

    $gestion = new \Vendor\Gestion\GestionAdmin();

    
    if(isset($_POST['add'])){
        $gestion->acceptInactiveUser(base64_decode($_POST['add']));
    }

    if(isset($_POST['delete'])){
        $gestion->deleteUser(base64_decode($_POST['delete']));
    }

    $inactif = $gestion->getAllInactiveUser();
    $actif = $gestion->getAllActiveUser();
      
?>

<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>
  
    <body class="cs_body">
        
        <?php include 'navbar.php';?>
        
        <br/><br/>
        <div class="container">
            <h3 style="text-align:center;">Liste des comptes <strong>Inactif</strong></h3><br/>
            <table class="table table-striped table-bordered">        
                <?php
                    \Vendor\Gestion\GestionAdmin::displayTable($inactif,true, true);
                ?>
            </table>

            <br/>
            <h3 style="text-align:center;">Liste des comptes <strong>Actif</strong></h3><br/>
            <table class="table table-striped table-bordered">        
                <?php
                    \Vendor\Gestion\GestionAdmin::displayTable($actif, false, true);
                ?>
            </table>
            
        </div>
        
        <?php include 'bottom.php';?>

    </body>
</html>