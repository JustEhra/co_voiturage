<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$macBalise = mysqli_real_escape_string($dbc, $_GET['macBalise']);
$mail = mysqli_real_escape_string($dbc, $_GET['mail']);
$destinationMac = mysqli_real_escape_string($dbc, $_GET['destination']);

#calcul age
$query = "INSERT INTO passager_has_point_rdv(utilisateur_id,point_rdv_id,point_arrive)
VALUES
    (   
        (SELECT `utilisateur`.`id`
    FROM `utilisateur`
    WHERE `utilisateur`.`mail` = '$mail'),
        (SELECT `point_rdv`.`id`
    FROM `point_rdv`
    WHERE `point_rdv`.`macBalise` = '$macBalise'),
        (SELECT `point_rdv`.`id`
    FROM `point_rdv`
    WHERE `point_rdv`.`macBalise` = '$destinationMac')
    )";


if(mysqli_query($dbc, $query)){
    http_response_code( 200);
}


mysqli_close($dbc);
#test
?>