<?php

    //Requires the MailSender
    require_once("../src/main/Vendor/Mailing/MailSender.php");
    //TODO: Require other files for BDD


    //TODO: Get the chosen one
    $sChosenOneMail = "yannis.beaux@gmail.com"; //...

    //We send the mail
    \Vendor\Mailing\MailSender::SendMail("m2test2.croissant.show@edu.univ-fcomte.fr" , $sChosenOneMail , "Je suis un mail envoye depuis le cron" , "oulah");

    //We send the mail to the chosen one
    echo "Sending the mail to : " . $sChosenOneMail;

    //We re-configure the cron for the next time
        //Production mode
        //TODO: Use the correct one : 
        $sProductionMode = "preprod";
        // $sProductionMode = "prod";

        //TODO: Remove the temporary cron file and select the correct one
        //TEMPORARY : (for tests)
        $sCronTime = "20 15 * * 2 ";
        //FINAL ONE : 
        // $sCronTime = "0 19 * * 1 ";    //All mondays at 19:00 PM

        //This is the configuration that will be written in the cronfile
        $sCronConfiguration = $sCronTime . "php /home/m2test2/public_html/" . $sProductionMode . "/static/cron.php";
    //

    //Delete old file and recreate one
    system("rm /home/m2test2/public_html/" . $sProductionMode . "/static/cronfileconfiguration.txt");
    $file = fopen("/home/m2test2/public_html/" . $sProductionMode . "/static/cronfileconfiguration.txt" , "w");
    //Writing config in the cron file
    fwrite($file , $sCronConfiguration . "\n"); //<Don't forget this for EOF error with crontab
    fclose($file);
    
    //Delete the actual cron configuration
    system("crontab -r");
    //Reconfigure it
    system("crontab /home/m2test2/public_html/" . $sProductionMode . "/static/cronfileconfiguration.txt");

    //Delete old file and recreate one
    // system("rm /home/m2test2/public_html/" . $sProductionMode . "/static/cronlog.txt");
    $file = fopen("/home/m2test2/public_html/" . $sProductionMode . "/static/cronlog.txt" , "w");
    //Writing config in the cron file
    fwrite($file , "J'ai écris dans ce fichier..." . "\n"); //<Don't forget this for EOF error with crontab
    fclose($file);

    //END

?>
