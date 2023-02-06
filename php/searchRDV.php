<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}
$mail ='';
$mail = mysqli_real_escape_string($dbc, $_GET['mail']);
$query = "SELECT `passager_has_conducteur`.`utilisateur_id` FROM `passager_has_conducteur`,`utilisateur` WHERE `passager_has_conducteur`.`utilisateur_id` = `utilisateur`.`id` AND `utilisateur`.`mail` = '$mail' ";

$res = mysqli_query($dbc,$query);

http_response_code(201);
if(mysqli_num_rows($res)>0)
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