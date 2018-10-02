<?php 
    include("Auth.php");
    use \Auth\Auth;
 
    if(isset($_POST['submit'])){
        $auth = new Auth();
        $auth->connection($_POST['username'], $_POST['password']);
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
                <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Log in</button>
            </div>
        </form>
    </div>
</div>

<style>
    .col-centered{
        float: none;
        margin: 100px auto;
        padding: 35px 30px;
        border-radius: 8px;
        background-color: rgba(30.9%, 72.4%, 96.8%,0.3);
    }
</style>

<?php $content = ob_get_clean(); ?>
<!-- End of Storage -->

<!-- Call the page template --> 
<?php require('template.php'); ?>