<?php
//Connecting to Database

$servername = "localhost";
$username = "root";
$password = "";
$dbname="cr10_jonathan_biglibrary";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully to Database<br><hr>";

?>