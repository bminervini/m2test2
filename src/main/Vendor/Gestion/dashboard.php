<?php $title = "dashboard"; ?>

<!-- Start of storage -->
<?php ob_start(); ?>
    <h1>Dashboard !</h1>
<?php $content = ob_get_clean(); ?>
<!-- End of Storage -->

<!-- Call the page template --> 
<?php require('template.php'); ?>