<?php

$connection = new mysqli("localhost", "prueba1", "1234", "prueba");
//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
?>