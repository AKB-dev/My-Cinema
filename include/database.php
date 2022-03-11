<?php
require_once 'dbconfig.php';

try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
    //echo "Database successfully connected\n";
} catch (PDOException $pe) {
    exit("Count not connect to the database $dname: " . $pe->getMessage() . "\n");
}


?>