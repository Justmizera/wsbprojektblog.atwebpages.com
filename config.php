<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'fdb34.awardspace.net');
define('DB_USERNAME', '4016277_justyna');
define('DB_PASSWORD', 'Projekt123!');
define('DB_NAME', '4016277_justyna');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>