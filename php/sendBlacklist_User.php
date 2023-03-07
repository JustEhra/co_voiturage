<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$BlacklistMAC = mysqli_real_escape_string($dbc, $_GET['Blacklist']);
$UserBloquant = mysqli_real_escape_string($dbc, $_GET['Utilisateurbloquant']);

$query = "INSERT INTO blacklist(utilisateur_bloquant,utilisateur_bloque) 
VALUES
((SELECT `utilisateur`.`id` FROM `utilisateur`WHERE `utilisateur`.`mail` = '$UserBloquant'), 
 (SELECT `utilisateur`.`id` FROM `utilisateur` 
     LEFT JOIN `conducteur` ON `conducteur`.`id` = `utilisateur`.`id`  
 WHERE  `conducteur`.`macbalise` = '$BlacklistMAC'))";
    mysqli_query($dbc, $query);

//    'INSERT INTO blacklist(utilisateur_bloquant,utilisateur_bloque)
//VALUES
//((SELECT `utilisateur`.`id` FROM `utilisateur`WHERE `utilisateur`.`mail` = 'b@b.b'),
// (
//     SELECT `utilisateur`.`id` FROM `utilisateur`
//     LEFT JOIN `conducteur` ON `conducteur`.`id` = `utilisateur`.`id`
// WHERE  `conducteur`.`macbalise` = "F0:09:66:8A:68:CF"))'

http_response_code(200);

mysqli_close($dbc);
?>