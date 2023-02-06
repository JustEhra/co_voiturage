<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$listPassager = str_getcsv(mysqli_real_escape_string($dbc, $_GET['listP']));
var_dump($listPassager);
foreach($listPassager as $item  ){
    $item = trim($item, '\"');
    $arr = explode(':', $item);
    $mail = $arr[1];
    $Nomlieu = $arr[0];
    $query = "INSERT INTO passager_has_conducteur(utilisateur_id,point_rdv_id)
    SELECT `utilisateur`.`id`,`point_rdv`.`id`
    FROM `utilisateur`,`point_rdv`
    WHERE `utilisateur`.`mail` = '$mail' AND `point_rdv`.`Nom_lieu` = '$Nomlieu'";
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