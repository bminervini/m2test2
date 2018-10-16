<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>
  
    <body class="cs_body">
        
        <?php include 'navbaruser.php';?>

        
        <div class="container">
        
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <iframe src="https://calendar.google.com/calendar/embed?mode=WEEK&;src=p12okt8nr8nq3ou1vsnpiin9hs%40group.calendar.google.com&ctz=Europe%2FPariswkst=$dayofweek&" 
                        style="border: 0" width="100%" height="100%" frameborder="0" scrolling="no">
                    </iframe>
                </div>
            </div>            
                

        </div>
        

        
        <?php include 'bottom.php';?>

    </body>
</html>