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

#calcul age
$query = "INSERT INTO utilisateur_has_point_rdv(utilisateur_id,point_rdv_id)
    SELECT `utilisateur`.`id`,`point_rdv`.`id`
    FROM `utilisateur`,`point_rdv`
    WHERE `utilisateur`.`mail` = '$mail' AND `point_rdv`.`macBalise` = '$macBalise'";


if(mysqli_query($dbc, $query)){

}
else{
echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}

mysqli_close($dbc);
#test
?>