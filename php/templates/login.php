<?php

function login() {
    global $dbc;
    $dbc = mysqli_connect("localhost", "admin", "xQBF7tcbsQxfdmsq", "covoituragedb");
    if(!$dbc) {
        die("DATABASE CONNECTION FAILED:" .mysqli_error($dbc));
        exit();
    }
}

?>