<html>

<<<<<<< HEAD
    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
=======
>>>>>>> origin/Calendrier_GoogleAPI
    <?php include 'head.php';?>
  
    <body class="cs_body">
        
        <?php 
<<<<<<< HEAD
            if(isset($_SESSION['isAdmin']) || 1)
=======
            if(isset($_SESSION['admin']) || 1)
>>>>>>> origin/Calendrier_GoogleAPI
            {
                include 'navbaradmin.php';
            }else 
            {
                include 'navbaruser.php';
            }
        ?>
        
        <div class="container">
            
            <div class="row">
                
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 text-center">
                    <h1>Bienvenue sur le dashboard de Croissant Show'</h1>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                
            </div>
            
        </div>
        
        
        <?php include 'bottom.php';?>

    </body>
</html>