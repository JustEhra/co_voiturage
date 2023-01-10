<?php

$dbc = mysqli_connect("HostName", "DatabaseUserName", "DatabasePassword", "DatabaseName");
if(!$dbc) {
die("DATABASE CONNECTION FAILED:" .mysqli_error($dbc));
exit();
}
$db = "DatabaseName";
$dbs = mysqli_select_db($dbc,$db );
if(!$dbs) {
die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
exit();
}
$ID = mysqli_real_escape_string($dbc, $_GET['ID']);
$Name = mysqli_real_escape_string($dbc, $_GET['Name']);
$Number = mysqli_real_escape_string($dbc, $_GET['Number']);
$Email = mysqli_real_escape_string($dbc, $_GET['Email']);
$query = "Update students SET Name='$Name',Number='$Number',Email='$Email' where ID='$ID'";
if(mysqli_query($dbc, $query)){
echo "Records Updated successfully";
} 
else{
echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}
mysqli_close($dbc);
?>