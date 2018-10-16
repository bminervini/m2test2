<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="/">Croissant Show</a>
	<div class="nav navbar">
		<div class="navbar-nav">
			<a class="nav-item nav-link active" href="dashboard.php" style="color:white">Dashboard</a>
			<a class="nav-item nav-link active" href="calendar.php" style="color:white">Calendrier</a>
<?php
	if(isset($_SESSION['admin']))
	{
?>
		<a class="nav-item nav-link" href="#" style="color:white">Parametres</a>
		<a class="nav-item nav-link" href="GestionAdhesion.php" style="color:white">Adhesions</a>
		<a class="nav-item nav-link" href="GestionParticipants.php" style="color:white">Participants</a>
<?php	
	}else 
	{ 
?>
		<a class="nav-item nav-link" href="participants.php" style="color:white">Participants</a>
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Modifier Participation<span class="caret"></span></button>
			
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><span class="glyphicon glyphicon-ok"></span>  Je participe</li>
				<li><span class="glyphicon glyphicon-remove"></span>  Je ne participe pas</li>
			</ul>
		</div>

<?php
	}
?>
			<a class="nav-item nav-link" href="login.php"><img src="i/shutdown.png" width="2%"></img></a>
		</div>
	</div>
</nav>

<script>

	//TODO: AJAX for "Je participe / Je participe"

</script>