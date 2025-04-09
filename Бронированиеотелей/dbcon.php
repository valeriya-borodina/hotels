<?php

$host = 'localhost';
$db = 'postgres';
$user = 'postgres';
$password = '12345';

$conn = pg_connect("host=$host port = 5432 dbname=$db user=$user password=$password");

?>