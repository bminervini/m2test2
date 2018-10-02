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
include 'Header.php';

$dao = new \DAO\DAO();

if (isset($_GET["action"]) && ($_GET["action"] == "reset"))
{
    $dao->dropTables();
    var_dump($dao->querySQL("SELECT Count(*) FROM INFORMATION_SCHEMA.Tables"));
    //$dao->initialisationBD();

}



?>

<a href="?action=reset" class="btn btn-dark" >Reset la base de données</a>


</body>
</html>