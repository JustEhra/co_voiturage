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
$query = "SELECT macbalise FROM (SELECT `passager_has_conducteur`.`conducteur_id`
    FROM `passager_has_conducteur`,`utilisateur` 
    WHERE `passager_has_conducteur`.`utilisateur_id` = `utilisateur`.`id` AND `utilisateur`.`mail` = '$mail') as temp
	LEFT JOIN `conducteur` ON `conducteur_id` = `conducteur`.`id`";

$res = mysqli_query($dbc,$query);


if(mysqli_num_rows($res)>0) {
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
            $csv_output .= "";
        }
        print $csv_output;

    }
    http_response_code( 200);
} else
    http_response_code(201);




//if(mysqli_query($dbc, $query)){
//
//}
//else{
//echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
//}

mysqli_close($dbc);
#test
?>