<?php

$dbc = mysqli_connect("localhost", "id20115828_co_voiturageuser", "xo4jMmA[(ANO}NyV", "id20115828_co_voituragedb");
if(!$dbc) {
die("DATABASE CONNECTION FAILED:" .mysqli_error($dbc));
exit();
}
$db = "id20115828_co_voituragedb";
$dbs = mysqli_select_db($dbc, $db);
if(!$dbs) {
die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
exit();
}
/*
$ID = mysqli_real_escape_string($dbc, $_GET['ID']);
$Name = mysqli_real_escape_string($dbc, $_GET['Name']);
$Number = mysqli_real_escape_string($dbc, $_GET['Number']);
$Email = mysqli_real_escape_string($dbc, $_GET['Email']);
$query = "INSERT INTO students(ID, Name, Number, Email) VALUES ('$ID', '$Name', '$Number', '$Email')";
*/
$query = "INSERT INTO conducteur(ID) VALUES ('01')";
if(mysqli_query($dbc, $query)){
echo "Records added successfully";
} 
else{
echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}
mysqli_close($dbc);

?>