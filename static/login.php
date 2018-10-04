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
                
                    
                    <form action="dashboard.php" method="POST" role="form">
                        <legend>Authentification</legend>
                    
                        <div class="form-group">
                            <label for="">Identifiant</label>
                            <input type="text" class="form-control" id="" placeholder="Identifiant" name="username">
                            <label for="">Mot de passe</label>
                            <input type="password" class="form-control" id="" placeholder="Mot de passe" name="password">
                        </div>

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