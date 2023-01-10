<?php

$dbc = mysqli_connect("HostName", "DatabaseUserName", "DatabasePassword", "DatabaseName");
if(!$dbc) {
die("DATABASE CONNECTION FAILED:" .mysqli_error($dbc));
exit();
}
$db = "DatabaseName";

$dbs = mysqli_select_db($dbc, $db);
if(!$dbs) {
die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
exit();
}
$ID = mysqli_real_escape_string($dbc, $_GET['ID']);

$query = "DELETE FROM students where ID=$ID";
if(mysqli_query($dbc, $query)){
echo "Record Deleted successfully";
} 
else{
echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}
mysqli_close($dbc);
?>