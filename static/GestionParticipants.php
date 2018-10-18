<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

    <?php include 'head.php';?>
	
	<?php

    require_once("../src/main/Vendor/DAO/DAO.php");    
    use \DAO\DAO;
	
	$DAO = new \Vendor\DAO\DAO();
	$reponse = $DAO->getListPersonne();
   
	?>
    <body class="cs_body">
        
        <?php include 'navbaruser.php';?>

        
        <div class="container">
        
            
            <table>
				<tr>
					<th>Prenom</th>
					<th>Nom</th>
					<th>Username</th>
					<th>Mail</th>
					<th>Participe</th>
					<th>NbreCroissantAmene</th>
					<th>Supprimer</th>
					<th>Modifier</th>
				</tr>
				
			<?php
			while($donnees = mysql_fetch_array($reponse))
			{
			?>
				<tr>
					<td><?php $donnees["nom"];?></td>
					<td><?php $donnees["prenom"];?></td>
					<td><?php $donnees["username"];?></td>
					<td><?php $donnees["mail"];?></td>
					<td><?php $donnees["participe"];?></td>
					<td><?php $donnees["nbreCroissantAmene"];?></td>
					<td><a href="#" onClick="javascript:return confirm('Voulez-vous vraiment supprimer cet élément ?')"><img src="i/supprimer.png" width="2%" alt="delete" title="Supprimer" /></a></td>
					<td><a href="#"><img src="i/update.png" width="2%" alt="edit" title="Editer XXX" /></a></td>
				</tr>
			<?php } ?>
			
			</table>
                
        </div> 
        <?php include 'bottom.php';?>

    </body>
</html>