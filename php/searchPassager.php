<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$query = "SELECT * FROM `utilisateur_has_point_rdv`";
$res = mysqli_query($dbc,$query);
$row = mysqli_fetch_array($res);

if(mysqli_query($dbc, $query)){
    echo "Records added successfully";
    http_response_code(202);
} 
else{
    echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}

mysqli_close($dbc);

?>