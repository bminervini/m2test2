<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="""#">Croissant Show</a>
	<div class="nav navbar">
		<div class="navbar-nav">
			<a class="nav-item nav-link active" href="dashboard.php" style="color:white">Dashboard</a>
			<a class="nav-item nav-link active" href="calendar.php" style="color:white">Calendrier</a>

			<?php
				if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
				{
					echo '<a class="nav-item nav-link" href="GestionUser.php" style="color:white">Utilisateurs</a>
						  <a class="nav-item nav-link" href="GestionAdminParticipants.php" style="color:white">Participants</a>
						  <a class="nav-item nav-link" href="cron_parameters.php" style="color:white">Cron</a>';
				
				}
			?>

			<a class="nav-item nav-link" href="logout.php"><i class="fas fa-power-off"></i></a>
            <span class="navbar-text">
                <?php
                    echo $_SESSION['username'];
                ?>
            </span>
		</div>
	</div>
</nav>

<script>

	//TODO: AJAX for "Je participe / Je participe"

</script>