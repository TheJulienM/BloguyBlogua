<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'julien');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'blog');
 
//connection a la base de donnée
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
