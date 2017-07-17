<?php
$server = '127.0.0.1:3306';
$usernameServer = 'root';
$passwordServer = '';
$dbname = 'miniProjectDB';

function executeQuery($query)
{
    global $connection, $server, $usernameServer, $passwordServer, $dbname;
    $result = false;
    $connection = mysqli_connect($server, $usernameServer, $passwordServer, $dbname);
    if ($connection) {
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        return $result;
    } else {
        die ('Connection Not Found' . mysqli_connect_error());
    }

}