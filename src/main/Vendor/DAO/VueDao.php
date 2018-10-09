<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue de la base de données</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<?php

include 'DAO.php';
include 'HeaderConfiguration.php';

$dao = new \Vendor\DAO\DAO();

if (isset($_GET["action"]) && ($_GET["action"] == "reset"))
{
    $dao->initialisationBD(100);
}

if (isset($_GET["action"]) && ($_GET["action"] == "resetTest"))
{
    $dao->dropTables(true);
    $dao->createTablePersonne("personneTest");
    $dao->createTableCalendrier("calendrierTest");
    $dao->createTableDisponibilite("disponibiliteTest");
    $dao->addAdmin("personneTest");
}

if (isset($_GET["action"]) && ($_GET["action"] == "resetTest"))
{
    $dao->dropTables(true);
    $dao->createTablePersonne("personneTest");
    $dao->createTableCalendrier("calendrierTest");
    $dao->createTableDisponibilite("disponibiliteTest");
    $dao->addAdmin("personneTest");
}

if (isset($_GET["action"]) && ($_GET["action"] == "dropTest"))
{
    $dao->dropTables(true);
}

?>

<a href="?action=reset" class="btn btn-dark" >Reset la base de données</a>
<a href="?action=resetTest" class="btn btn-dark" >Reset de la base de données de Test</a>
<a href="?action=dropTest" class="btn btn-dark" >Drop des tables test</a>


</body>
</html>