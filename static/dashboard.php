<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>
  
    <body class="cs_body">
        
<<<<<<< HEAD
        <?php 
            if(isset($_SESSION['isAdmin']) || 1)

            {
                include 'navbaradmin.php';
            }else 
            {
                include 'navbaruser.php';
            }
        ?>
=======
        <?php include 'navbar.php';?>
>>>>>>> origin/design
        
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