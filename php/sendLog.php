<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}
$point = mysqli_real_escape_string($dbc, $_GET['point']);
$date = date('Y-m-d H:i:s');
$dateH = date('H:i:s');

$query = "INSERT INTO `log_tempo`(`conducteur_id`, `utilisateur_id`, `point_rdv_id`, `date`, `heure`,`Depart_arrivee`) SELECT `conducteur_id`, `utilisateur_id`, `point_rdv_id`, '$date', '$dateH','$point' FROM passager_has_conducteur";
$res = mysqli_query($dbc, $query);

$query_rch = "SELECT * FROM `log_tempo` WHERE log_tempo.log_id=(SELECT MAX(log_id) FROM `log_tempo`)";
$RES = mysqli_query($dbc, $query_rch);

file_put_contents("../../LOG/fichier.log", $RES, FILE_APPEND);

if(mysqli_query($dbc, $query)){
    http_response_code( 200);
}

mysqli_close($dbc);

?>