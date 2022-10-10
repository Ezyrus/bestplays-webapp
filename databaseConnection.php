<?php

function databaseConnection() {
$dbHost = 'localhost';
$dbName = 'bestplaysdb';
$dbUsername = 'root';
$dbPassword = '';

$connection = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);

return $connection;
}

?>