<?php

function login() {
    global $dbc,$db,$dbs;
    $dbc = mysqli_connect("localhost", "admin", "xQBF7tcbsQxfdmsq", "covoituragedb");
    if(!$dbc) {
        die("DATABASE CONNECTION FAILED:" .mysqli_error($dbc));
        exit();
    }
    $db = "covoituragedb";
    $dbs = mysqli_select_db($dbc, $db);
}

?>