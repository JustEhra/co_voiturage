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

$query = "SELECT * FROM `students`";
$res = mysqli_query($dbc,"SELECT * FROM `students`");
$row = mysqli_fetch_array($res);



if(mysqli_query($dbc, $query)){


} 
else{
echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}
?>

<h2>Student Details</h2>

<table border="2">
  <tr>
    <td>ID.</td>
    <td>Name</td>
    <td>Number</td>
    <td>Email</td>
  </tr>

<?php

while($data = mysqli_fetch_array($res))
{
?>
  <tr>
    <td><?php echo $data['ID']; ?></td>
    <td><?php echo $data['Name']; ?></td>
    <td><?php echo $data['Number']; ?></td>
    <td><?php echo $data['Email']; ?></td>
  </tr>	
<?php
}
?>
</table>



<php
mysqli_close($dbc);
?>