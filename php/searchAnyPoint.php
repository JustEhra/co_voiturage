<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}
if(!isset($_GET['lat']) && !isset($_GET['long'])) {
    die("Lat or long not set");
    exit();
}
$lat = $_GET['lat'];
$long = $_GET['long'];
$query = "SELECT Nom_Lieu,macBalise,Coordonnes_gps_lat,Coordonnes_gps_long, (6371 * 2 * ASIN(SQRT( POWER(SIN(( $lat - Coordonnes_gps_lat) *  pi()/180 / 2), 2) +COS( $lat * pi()/180) * COS(Coordonnes_gps_lat * pi()/180) * POWER(SIN(( $long - Coordonnes_gps_long) * pi()/180 / 2), 2) ))) as distance  
from point_rdv  
having  distance <= 200
order by distance";
$res = mysqli_query($dbc,$query);

if(mysqli_query($dbc, $query)){
    http_response_code(203);
    $csv_output='';
    while ($row = mysqli_fetch_assoc($res))
    {
        $comma = "";
        foreach(  $row as $key=>$value )
        {
            $csv_output .= $comma . $value;
            $comma = " , ";
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