<?php
//This file is to connect to your database.
$host = 'localhost';
$dbname = 'sample1'; //<--replace this with the name of your Database
$username = 'root';
$password = '';

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
    die();
}

//required
?>
