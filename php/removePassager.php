<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$mail = mysqli_real_escape_string($dbc, $_GET['mail']);

#calcul age
$query = "DELETE FROM passager_has_point_rdv where utilisateur_id=(SELECT `utilisateur`.`id`
    FROM `utilisateur`
    WHERE `utilisateur`.`mail` = '$mail')";


if(mysqli_query($dbc, $query)){
    http_response_code( 200);
}


mysqli_close($dbc);
#test
?>