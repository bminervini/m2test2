<?php 
    require_once("../src/main/Vendor/Gestion/GestionAdmin.php");

    $gestion = new \Vendor\Gestion\GestionAdmin();

    if(isset($_POST['delete'])){
        $gestion->deleteParticipant(base64_decode($_POST['delete']));
    }

    $participants = $gestion->getAllParticipants();
?>

<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>
  
    <body class="cs_body">
        
        <?php include 'navbar.php';?>
        
        <br/><br/>
        <div class="container">
            <h3 style="text-align:center;">Liste des <strong>Participants</strong></h3><br/>
            <table class="table table-striped table-bordered">        
                <?php
                    \Vendor\Gestion\GestionAdmin::displayTable($participants,false);
                ?>
            </table>
        </div>
        
        <?php include 'bottom.php';?>

    </body>
</html>