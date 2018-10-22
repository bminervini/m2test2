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

        <?php include 'navbar.php'; ?>


        
        
        
        <div class="container">
            <div class="row">
                
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <form action="cron_parameters.php" method="GET" role="form">
                    <legend>Configurer l'envoi de mails</legend>

                    <p>L'envoi de mail au prochain responsable des croissants est envoyé périodiquement.
                    Cette configuration permet de choisir quel jour, et à quelle heure le mail devra être envoyé</p>

                    <!-- <div class="form-group">
                        <label for="">Nom de la configuration</label>
                        <input type="text" class="form-control text-center" name="name">
                    </div> -->
                    <div class="form-group">
                        <label for="sel1">Jour de la semaine</label>
                        <select class="form-control text-center" name="day">
                            <option value="0">Lundi</option>
                            <option value="1">Mardi</option>
                            <option value="2">Mercredi</option>
                            <option value="3">Jeudi</option>
                            <option value="4">Vendredi</option>
                            <option value="5">Samedi</option>
                            <option value="6">Dimanche</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="sel1">Heure</label>
                        <input type="time" class="form-control text-center" name="time">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>      
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    
                </div>
                
            </div>
        </div>
        

        <?php
        
            if (isset($_GET['time']))
            {
                $time = explode(":" , $_GET['time']);
                echo "Heure : " . $time[0] . ' | Minute : ' . $time[1];
                echo $_GET['day'];
                
            }

        ?>
        
    </body>
</html>