<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$Blacklist = str_getcsv(mysqli_real_escape_string($dbc, $_GET['Blacklist']));
$PassagerBloquant = mysqli_real_escape_string($dbc, $_GET['Utilisateurbloquant']);


foreach($Blacklist as $item  ){

    $query = "INSERT INTO Blacklist(utilisateur_bloquant,utilisateur_bloque) 
    VALUES
    ((SELECT `utilisateur`.`id` FROM `utilisateur`WHERE `utilisateur`.`mail` = '$PassagerBloquant'), (SELECT `utilisateur`.`id` FROM `utilisateur`WHERE `utilisateur`.`mail` = '$item') )";


    mysqli_query($dbc, $query);
}
http_response_code(200);

mysqli_close($dbc);
?>