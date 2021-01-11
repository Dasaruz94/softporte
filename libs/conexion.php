<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 9/07/15
 * Time: 10:09 AM
 */

/*$mysqli = new mysqli("localhost", "root", "", "compu_hardware");
if ($mysqli->connect_errno) {
    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

$mysqli = new mysqli("127.0.0.1", "usuario", "contraseña", "basedatos", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "\n"; */


$servername = "localhost";
$username = "daniel";
$password = "1q2w3e4r5t";
$dbname = "compuhar_system";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}



?>