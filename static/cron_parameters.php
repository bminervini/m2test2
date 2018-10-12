<?php

    exec('crontab -l' , $return);

    foreach ($return as $value)
    {
        echo $value;
    }


?>