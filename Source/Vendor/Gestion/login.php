<?php 
    
    //include("config.php");
    //session_start();

    //echo password_hash("test",PASSWORD_BCRYPT);

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        /*
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        
        $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];

        $count = mysqli_num_rows($result);

        if($count == 1) {
        */

        if(!empty($_POST['username'])){
            //session_register("myusername");
            //$_SESSION['login_user'] = $myusername;
            
            header("Location: dashboard.php");
        }else {
            $error = "Your Login Name or Password is invalid";
        }

    }
?>

<?php $title = "log page"; ?>

<!-- Start of storage -->
<?php ob_start(); ?>

<br/>
<div class="container">
    <div class="col-md-5 col-centered">
    <form action="" method="post">
        <h2>Login Page</h2>

        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">        	
        </div>
        
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
             
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Log in</button>
        </div>
    </form>
    </div>
</div>

<style>
    .col-centered{
        float: none;
        margin: 0 auto;
        padding: 20px;
    }
</style>

<?php $content = ob_get_clean(); ?>
<!-- End of Storage -->

<!-- Call the page template --> 
<?php require('template.php'); ?>