<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}
$nbPassager = 1;
if( mysqli_real_escape_string($dbc, $_GET['nbPassager']))
    $nbPassager = mysqli_real_escape_string($dbc, $_GET['nbPassager']);

$query = "SELECT `point_rdv`.`Nom_lieu`, `utilisateur`.`mail`
FROM `utilisateur_has_point_rdv` 
	LEFT JOIN `utilisateur` ON `utilisateur_has_point_rdv`.`utilisateur_id` = `utilisateur`.`id` 
	LEFT JOIN `point_rdv` ON `utilisateur_has_point_rdv`.`point_rdv_id` = `point_rdv`.`id`
	LIMIT $nbPassager";
$res = mysqli_query($dbc,$query);


if(mysqli_query($dbc, $query)){
    http_response_code(202);
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

mysqli_close($dbc);

?>