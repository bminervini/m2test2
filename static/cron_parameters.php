<?php

    exec('crontab -l' , $return);

    foreach ($return as $value)
    {
        echo $value;
    }

    //
    // -> /home/m2test2/public_html/preprod
    // * * * * * * php-cli -f /home/m2test2/public_html/preprod/static/sendsimplemail.php

    

?>

<!DOCTYPE html>
<html>

    <?php include 'head.php'?>

    <body>

        
        <form action="" method="POST" role="form">
            <legend>Form title</legend>
        
            <div class="form-group">
                <label for="">label</label>
                <input type="text" class="form-control" id="" placeholder="Input field">
            </div>
        
            
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        
    </body>
</html>