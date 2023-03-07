<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$mail = mysqli_real_escape_string($dbc, $_GET['mail']);
$destination_conducteur = mysqli_real_escape_string($dbc, $_GET['dest']);
$lat = $_GET['lat'];
$long = $_GET['long'];

$query = "
SELECT point.`Nom_lieu`, `utilisateur`.`mail` , (6371 * 2 * ASIN(SQRT( POWER(SIN(( $lat - point.Coordonnes_gps_lat) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(point.Coordonnes_gps_lat * pi()/180) * POWER(SIN(( $long - point.Coordonnes_gps_long) * pi()/180 / 2), 2) ))) as distance
FROM `passager_has_point_rdv` 
	LEFT JOIN `utilisateur` ON `passager_has_point_rdv`.`utilisateur_id` = `utilisateur`.`id` 
	LEFT JOIN `point_rdv` destination ON `passager_has_point_rdv`.`point_arrivee_id` = `destination`.`id`
    LEFT JOIN `point_rdv` point ON `passager_has_point_rdv`.`point_rdv_id` = `point`.`id`
    WHERE `destination`.`macBalise` = '$destination_conducteur' 
    AND `utilisateur`.`id` NOT IN (SELECT utilisateur_bloque FROM blacklist
                                     LEFT JOIN `utilisateur` ON `blacklist`.`utilisateur_bloquant` = `utilisateur`.`id` 
                                     WHERE utilisateur.mail='$mail' )
    AND `utilisateur`.`id` NOT IN (SELECT utilisateur_bloquant FROM blacklist
                                     LEFT JOIN `utilisateur` ON `blacklist`.`utilisateur_bloque` = `utilisateur`.`id` 
                                     WHERE utilisateur.mail='$mail' )
    having  distance <= 200
	LIMIT 4";

$res = mysqli_query($dbc,$query);

if(gettype($res) == "boolean" && !$res)
{
    http_response_code(205);
    exit();
}


if(mysqli_query($dbc, $query)){
    http_response_code(200);
    $csv_output='';
    while ($row = mysqli_fetch_assoc($res))
    {
        $comma = "";
        foreach(  $row as $key=>$value )
        {
            $csv_output .= $comma . $value;
            $comma = ":";
        }
        $csv_output .= ";";
    }
    print $csv_output;

}
else{
    echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}


if(mysqli_num_rows($res)==0)
    http_response_code(201);

mysqli_close($dbc);

?>