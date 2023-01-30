<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$listPassager = str_getcsv(mysqli_real_escape_string($dbc, $_GET['listP']));

foreach($listPassager as $item  ){
    $item = trim($item, '\"');
    $arr = explode(':', $item);
    $prenom = $arr[1];
    $Nomlieu = $arr[0];
    $query = "INSERT INTO utilisateur_rdv(utilisateur_id,point_rdv_id)
    SELECT `utilisateur`.`id`,`point_rdv`.`id`
    FROM `utilisateur`,`point_rdv`
    WHERE `utilisateur`.`prenom` = '$prenom' AND `point_rdv`.`Nom_lieu` = '$Nomlieu'";
    mysqli_query($dbc, $query);
}
http_response_code(205);





//if(mysqli_query($dbc, $query)){
//
//}
//else{
//echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
//}

mysqli_close($dbc);
#test
?>