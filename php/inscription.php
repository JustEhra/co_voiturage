<?php
require './templates/login.php';
global $dbc,$db,$dbs;

login();
if(!$dbs) {
    die("DATABASE SELECTION FAILED:" .mysqli_error($dbc));
    exit();
}

$nom = mysqli_real_escape_string($dbc, $_GET['nom']);
$prenom = mysqli_real_escape_string($dbc, $_GET['prenom']);
$age = mysqli_real_escape_string($dbc, $_GET['age']);
$conduit = mysqli_real_escape_string($dbc, $_GET['conducteur']);

#calcul age
$query = "INSERT INTO utilisateur(nom, prenom, age, conduit) VALUES ('$nom','$prenom','$age','$conduit')";


if(mysqli_query($dbc, $query)){
echo "Records added successfully";
http_response_code(2000);
} 
else{
echo "ERROR: Could not able to execute". $query." ". mysqli_error($dbc);
}

mysqli_close($dbc);
#test
?>