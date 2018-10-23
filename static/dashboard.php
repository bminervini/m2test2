<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>

    <?php

    require_once("../src/main/Vendor/DAO/DAO.php");
    require_once("../src/main/Vendor/Calendar/SubscribersList.php");
    require_once("../src/main/Vendor/Calendar/ShowEvents.php");
	require_once("../src/main/Vendor/Calendar/quickstart.php"); 
	
	use \Vendor\Calendar\quickstart; 
	
	
	$tokenPath = '../src/main/Vendor/Calendar/token'.$_SESSION["username"].'.json';
	
	if(!file_exists($tokenPath)){
		$qs = new quickstart(); 
		$qclient = $qs->getClient($_SESSION["username"]); 
		$hyperlink = $qs->getAuthUrl($qclient); 
	}

    $dao = new \Vendor\DAO\DAO();
    $personne = $dao->getPersonneByUsername($_SESSION["username"], "personne");
    $texteParticipe = "Votre compte a été supprimé";
    if (count($personne) > 0) {
        $statutParticipation = $personne[0]['statutParticipation'];

        if(isset($_POST['statut']))
        {
            $statutParticipation = !$statutParticipation;
            $dao->setParticipationByUsername($_SESSION["username"], $statutParticipation);
            //$events = new \Vendor\Calendar\ShowEvents($_SESSION["username"]);
			//$choosed = $events->chooseSomeone();
        }
		
		if(!file_exists($tokenPath)){
			if(isset($_POST['cleGoogle'])){
				$qs->createToken($_SESSION['username'],$_POST['cleGoogle'],$qclient);	
			}
		}

        if ($statutParticipation == 0) {
            $texteParticipe = "Je ne participe pas";
            $classButton = "btn btn-warning";
        } else {
            $texteParticipe = "Je participe";
            $classButton = "btn btn-success";
        }
    }

    require_once("../src/main/Vendor/Gestion/GestionAdmin.php");
    $gestion = new \Vendor\Gestion\GestionAdmin();
    $participants = $gestion->getAllParticipants();

    ?>

    <body class="cs_body">
        
        <?php include 'navbar.php';?>
        <div class="container">
            
            <div class="row">
                
                <div class="col-sm">

                    <h2>Participation</h2>
                    <form action="dashboard.php" method="POST" role="form">
                        <button type="submit" name="statut" class="<?php echo $classButton?>"> <?php echo $texteParticipe ?></button>
                    </form>

                </div>
				
                <div class="col-sm">

                    <h2>Liste des participants</h2>

                    <div class="container">
                        <table class="table table-striped table-bordered">
                            <?php
                            \Vendor\Gestion\GestionAdmin::displayParticipant($participants);
                            ?>
                        </table>
                    </div>

                </div>
                
            </div>
			
				
				<?php 
				
				if(!file_exists($tokenPath)){
					echo "
					<div class=\"form-group\">
						<form action=\"dashboard.php\" method=\"POST\" role=\"form\">
									<label for=\"\">Association compte gmail -><a href=".$hyperlink." target=\"_blank\">Ici</a></label>
									<input type=\"text\" class=\"form-control\" id=\"\" placeholder=\"Clé Google\" name=\"cleGoogle\" required=\"required\">
						<button type=\"submit\" class=\"btn btn-default center-block\" name=\"submit\">Liez mon compte ! </button>
				
					</div>"; 
				}
				
				?>
        </div>
        
        
        <?php include 'bottom.php';?>

    </body>
</html>