<?php 
    require_once("../src/main/Vendor/Gestion/Auth.php");
<<<<<<< HEAD

    if(isset($_POST['submit']))
    {
        $auth = new \Vendor\Gestion\Auth();
        $error = $auth->connection($_POST['username'], $_POST['password']);
    }
=======
    // use Vendor\Auth;

    if(isset($_POST['submit']))
    {
        $auth = new Auth\Auth();
        $auth->connection($_POST['username'], $_POST['password'])."\n";
    }

    // echo "YOLOOO";
>>>>>>> origin/Calendrier_GoogleAPI
?>

<?php $title = "log page"; ?>

<!-- Start of storage -->
<<<<<<< HEAD
=======


>>>>>>> origin/Calendrier_GoogleAPI
<html>

    <!-- Include head html -->
    <?php include 'head.php';?>

    <body class="cs_body">

        <!-- Include jumbotron -->
        <?php include 'jumbotron.php';?>

        <div class="container">
            
            <div class="row">
                
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                
                    
<<<<<<< HEAD
                    <form action="login.php" method="POST" role="form">
                        <br/>
                        <h2>Authentification</h2>
=======
                    <form action="" method="POST" role="form">
                        <legend>Authentification</legend>
>>>>>>> origin/Calendrier_GoogleAPI
                    
                        <div class="form-group">
                            <label for="">Identifiant</label>
                            <input type="text" class="form-control" id="" placeholder="Identifiant" name="username">
<<<<<<< HEAD
                        </div>

                        <div class="form-group">
                            <label for="">Mot de passe</label>
                            <input type="password" class="form-control" id="" placeholder="Mot de passe" name="password">
                        </div>
 
                        <?php
                            if(isset($error))
                            { 
                                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                            }
                        ?>
=======
                            <label for="">Mot de passe</label>
                            <input type="password" class="form-control" id="" placeholder="Mot de passe" name="password">
                        </div>
>>>>>>> origin/Calendrier_GoogleAPI

                        <button type="submit" class="btn btn-default center-block" name="submit">Envoyez les croissants ! </button>
                    </form>
                    
                </div>
                
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                </div>
                
            </div>
            
        </div>
        

        <?php include 'bottom.php';?>
        
    </body>
</html>

<!-- End of Storage -->