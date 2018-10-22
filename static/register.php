<!-- used to redirect if the user is not connected -->
<?php //include_once 'session.php' ?>

<?php 
    require_once("../src/main/Vendor/Gestion/Registration.php");
    use \Vendor\Gestion\Registration;

    if(isset($_POST['submit']))
    { 
        $register = new Registration();
        $res = $register->registration($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['mailedu'], $_POST['gmail'], (empty($_POST['admin']))? "0": $_POST['admin']);
        
        $msg = $register->errorMsg($res);
    }
?>

<?php $title = "register page"; ?>

<html>

    <!-- Include head html -->
    <?php include 'head.php';?>

    <body class="cs_body">

        <!-- Include jumbotron -->
        <?php include 'jumbotron.php';?>

        <div class="container">
            
            <div class="row">
                
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                
                    <form action="register.php" method="POST" role="form">
                        <br/>
                        <h2>Enregistrement</h2>
                    
                        <div class="form-group">

                            <div class="form-group">
                                <label for="">Prenom</label>
                                <input type="text" class="form-control" id="" placeholder="Tony" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>"  required="required">
                            </div>

                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" id="" placeholder="Truand" name="lastname" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required="required">
                            </div>

                            <div class="form-group">
                                <label for="">Mail</label>
                                <div class="form-inline">
                                    <input type="text" class="form-control" id="" placeholder="tony.letruand" name="mailedu" value="<?php echo isset($_POST['mailedu']) ? $_POST['mailedu'] : '' ?>" required="required">@edu.univ-fcomte.fr
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Mail</label>
                                <div class="form-inline">
                                    <input type="text" class="form-control" id="" placeholder="tonyletruand" name="gmail" value="<?php echo isset($_POST['gmail']) ? $_POST['gmail'] : '' ?>" required="required">@gmail.com
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Identifiant</label>
                                <input type="text" class="form-control" id="" placeholder="Identifiant" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required="required">
                            </div>

                            <div class="form-group">
                                <label for="">Mot de passe</label>
                                <input type="password" class="form-control" id="" placeholder="Mot de passe" name="password" required="required">
                            </div>

                            <div class="form-group">
                                <label for="">Association compte gmail</label>
                                <input type="text" class="form-control" id="" placeholder="Clé Google" name="cleGoogle" required="required">
                            </div>

                            <div class="form-group">
                                <input type="checkbox" id="admin" name="admin" value="1"/>
                                <label for="scales">Administrateur</label>
                            </div>


                        </div>

                        <?php
                            if(isset($msg) && isset($res) && $res != 0) { echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>'; }
                            if(isset($msg) && isset($res) && $res == 0) { echo '<div class="alert alert-success" role="alert">'.$msg.'</div>'; }
                        ?>

                        <button type="submit" class="btn btn-default center-block" name="submit">Envoyez les croissants ! </button>  
                        <a class="btn btn-default center-block" href="login.php">Back to Login</a>
                    </form>
                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>

            </div>
            
        </div>
        
        <!-- Include Bottom -->
        <?php include 'bottom.php';?>
        
    </body>
</html>
