<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}
$mailConducteur = mysqli_real_escape_string($dbc, $_GET['mailConducteur']);
$listPassager = str_getcsv(mysqli_real_escape_string($dbc, $_GET['listP']));
var_dump($listPassager);
$date = date('Y-m-d H:i:s');
$dateH = date('H:i:s');

foreach($listPassager as $item  ){
    $item = trim($item, '\"');
    $arr = explode(':', $item);
    $mail = $arr[1];
    $Nomlieu = $arr[0];
    $query = "INSERT INTO passager_has_conducteur(utilisateur_id,point_rdv_id,date,heure,conducteur_id)
    Values (
    (SELECT `utilisateur`.`id` FROM `utilisateur` WHERE `utilisateur`.`mail` = '$mail'),
    (SELECT `point_rdv`.`id` FROM `point_rdv` WHERE `point_rdv`.`Nom_lieu` = '$Nomlieu'),
    ('$date'),
    ('$dateH'),
    (SELECT `utilisateur`.`id`FROM `utilisateur`WHERE `utilisateur`.`mail` = '$mailConducteur'))";
    mysqli_query($dbc, $query);

    $query = "DELETE FROM passager_has_point_rdv where utilisateur_id=(SELECT `utilisateur`.`id`
    FROM `utilisateur`
    WHERE `utilisateur`.`mail` = '$mail')";
    mysqli_query($dbc, $query);
}
http_response_code( 200);





//if(mysqli_query($dbc, $query)){
//
//}
//else{
//echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
//}

mysqli_close($dbc);
#test
?>