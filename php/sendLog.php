<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$query = "INSERT INTO `log_tempo`(`conducteur_id`, `utilisateur_id`, `point_rdv_id`, `date`, `heure`) SELECT `conducteur_id`, `utilisateur_id`, `point_rdv_id`, `date`, `heure` FROM passager_has_conducteur";
$res = mysqli_query($dbc, $query);

file_put_contents("../../LOG/fichier.log", $query, FILE_APPEND);

if(mysqli_query($dbc, $query)){
    http_response_code( 200);
}

mysqli_close($dbc);

?>