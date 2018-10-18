<?php 
    require_once("../src/main/Vendor/Gestion/GestionAdmin.php");

    $gestion = new \Vendor\Gestion\GestionAdmin();
    $actif = $gestion->getAllInactiveUser();

    $inactif = $gestion->getAllActiveUser();
?>

<html>

    <!-- used to redirect if the user is not connected -->
    <?php include_once 'session.php' ?>
    <?php include 'head.php';?>
  
    <body class="cs_body">
        
        <?php include 'navbar.php';?>
        
        <br/><br/>
        <div class="container">
            <h3>Liste des comptes Inactifs :</h3><br/>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Edumail</th>
                    <th scope="col">Gmail</th>
                    <th scope="col">isAdmin</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $cnt = 0;

                        if(empty($actif)){
                            echo '<tr>
                                 <th scope="row"></th>
                                 <td>No users to display</td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 </tr>'; 
                        }

                        foreach($actif as $val)
                        { 
                            echo '<tr>
                                 <th scope="row">'.$cnt.'</th>
                                 <td>'.$val['username'].'</td>
                                 <td>'.$val['nom'].'</td>
                                 <td>'.$val['prenom'].'</td>
                                 <td>'.$val['mail'].'</td>
                                 <td>'.$val['gmail'].'</td>
                                 <td>'.$val['isAdmin'].'</td>
                                 </tr>';

                            $cnt++;
                        }
                    ?>
                </tbody>
            </table>
            
           
           
        </div>
        
        <?php include 'bottom.php';?>

    </body>
</html>