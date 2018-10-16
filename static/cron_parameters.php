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