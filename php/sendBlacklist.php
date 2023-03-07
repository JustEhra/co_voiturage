<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$Blacklist = str_getcsv(mysqli_real_escape_string($dbc, $_GET['Blacklist']));
$ConducteurBloquant = mysqli_real_escape_string($dbc, $_GET['Utilisateurbloquant']);


foreach($Blacklist as $item  ){

    $item = str_replace( array( '\\', '"', ',' , ';', '<', '>', '[', ']' ), '', $item);
    var_dump($item);
    $query = "INSERT INTO blacklist(utilisateur_bloquant,utilisateur_bloque) 
    VALUES
    ((SELECT `utilisateur`.`id` FROM `utilisateur`WHERE `utilisateur`.`mail` = '$ConducteurBloquant'), (SELECT `utilisateur`.`id` FROM `utilisateur`WHERE `utilisateur`.`mail` = '$item') )";

    mysqli_query($dbc, $query);
}
http_response_code(200);

mysqli_close($dbc);
?>