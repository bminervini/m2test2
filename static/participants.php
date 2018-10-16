<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<?php include 'head.php';?>
	<?php

		require_once("../src/main/Vendor/DAO/DAO.php");    
		use \DAO\DAO;
		
		//$dao = new \Vendor\DAO\DAO();
		$reponse = (new \Vendor\DAO\DAO())->getListPersonne();
   
	?>

<body class="cs_body">
        
	<?php include 'navbaruser.php';?>

	
	<div class="container">
	
		
		<table>
			<tr>
				<th>Prenom</th>
				<th>Nom</th>
			</tr>
			
		<?php
		while($donnees = mysql_fetch_array($reponse))
		{
		?>
			<tr>
				<td><?php $donnees["nom"];?></td>
				<td><?php $donnees["prenom"];?></td>	
			</tr>
		
		</table>
			
	</div> 
	<?php include 'bottom.php';?>
</body>
</html>