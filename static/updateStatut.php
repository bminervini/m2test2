<?php

	require_once("../src/main/Vendor/DAO/DAO.php");
    use \DAO\DAO;

	$dao = new DAO\DAO();
	$utilisateurConnecte = $_SESSION['idPersonne'];
	$update = $dao->updatePersonne($utilisateurConnecte, personne)
?>