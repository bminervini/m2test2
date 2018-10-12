<<<<<<< HEAD
<!-- used to redirect if the user is not connected -->
<?php include_once 'session.php' ?>

<?php 
    require_once("../src/main/Vendor/Gestion/Registration.php");
    use \Vendor\Gestion\Registration;

    if(isset($_POST['submit']))
    { 
        $register = new Registration();
        $result = $register->registration($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['mail'], (empty($_POST['admin']))? "0": $_POST['admin']);
        
        if($result){
            $success = "User successfully registered !";
            $_POST = array();
        }else{
            $error = "Username already used ! ";
        }
    }
?>

<?php $title = "register page"; ?>
=======
<?php 
    require_once("../src/main/Vendor/Gestion/Auth.php");
    use \Auth\Auth;

    if(isset($_POST['submit']))
    {
        $auth = new Auth();
        $auth->connection($_POST['username'], $_POST['password'])."\n";
    }

    // echo "YOLOOO";
?>

<?php $title = "log page"; ?>

<!-- Start of storage -->

>>>>>>> origin/Calendrier_GoogleAPI

<html>

    <!-- Include head html -->
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
        <!-- Include jumbotron -->
        <?php include 'jumbotron.php';?>
>>>>>>> origin/Calendrier_GoogleAPI

        <div class="container">
            
            <div class="row">
                
<<<<<<< HEAD
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
                                <input type="mail" class="form-control" id="" placeholder="tonyletruand@exemple.com" name="mail" value="<?php echo isset($_POST['mail']) ? $_POST['mail'] : '' ?>" required="required">
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
                                <input type="checkbox" id="admin" name="admin" value="1"/>
                                <label for="scales">isAdmin</label>
                            </div>          
                        </div>

                        <?php
                            if(isset($error)) { echo '<div class="alert alert-danger" role="alert">'.$error.'</div>'; }
                            if(isset($success)) { echo '<div class="alert alert-success" role="alert">'.$success.'</div>'; }
                        ?>

                        <button type="submit" class="btn btn-default center-block" name="submit">Envoyez les croissants ! </button>  
                    </form>
                    
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
=======
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                
                    
                    <form action="login.php" method="POST" role="form">
                        <legend>Enregistrement</legend>
                    
                        <div class="form-group">

                            <label for="">Prenom</label>
                            <input type="text" class="form-control" id="" placeholder="Tony" name="firstname">

                            <label for="">Nom</label>
                            <input type="text" class="form-control" id="" placeholder="Truand" name="lastname">

                            <label for="">Mail</label>
                            <input type="mail" class="form-control" id="" placeholder="tonyletruand@exemple.com" name="mail">

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
>>>>>>> origin/Calendrier_GoogleAPI
                
            </div>
            
        </div>
        
<<<<<<< HEAD
        <!-- Include Bottom -->
        <?php include 'bottom.php';?>
        
    </body>
</html>
=======

        <?php include 'bottom.php';?>
        
    </body>
</html>

<!-- End of Storage -->
>>>>>>> origin/Calendrier_GoogleAPI
