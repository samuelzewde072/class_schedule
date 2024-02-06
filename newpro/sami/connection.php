<?php
$SN = "localhost";
$user = "root";
$password = "";
$Databasename = "class_schedule";

$conn = new mysqli($SN, $user, $password, $Databasename);
if (!$conn) {
    echo "not connected" . $conn->connect_error;
}
