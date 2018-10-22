<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>
	<?php

		require_once("../src/main/Vendor/DAO/DAO.php");
		use \DAO\DAO;

		$dao = new DAO\DAO();
		$idUserConnecte = $_SESSION['idPersonne'];
		$req = $dao->getPersonById($idUserConnecte);
		$utilisateurConnecte = $req->fetch();
		$update = $dao->updateStatusPersonne($utilisateurConnecte, $_POST['status']);
		
		//<!-- a faire fonction getUserById et fonction update statut personne dans dao et en cliquand sur un bouton envoyer le statut en meme temps -->
	?>
  
    <body class="cs_body">
        
        <?php include 'navbar.php';?>
        
        <div class="container">
            
            <div class="row">
                
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                    <h1>Bienvenue sur le dashboard de Croissant Show'</h1>
					<h2>Votre demande de changement de status sera traitee dans les meilleurs delai'</h2>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                
            </div>
        </div>
        
        
        <?php include 'bottom.php';?>

    </body>
</html>