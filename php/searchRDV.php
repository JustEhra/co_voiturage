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
$query = "SELECT `utilisateur_rdv`.`utilisateur_id` FROM `utilisateur_rdv`,`utilisateur` WHERE `utilisateur_rdv`.`utilisateur_id` = `utilisateur`.`id` AND `utilisateur`.`mail` = '$mail' ";

$res = mysqli_query($dbc,$query);

if(mysqli_num_rows($res)>0)
    http_response_code(206);





//if(mysqli_query($dbc, $query)){
//
//}
//else{
//echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
//}

mysqli_close($dbc);
#test
?>