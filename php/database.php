<?php

$DB_DSN = "mysql:dbname=portfolio;host=localhost";
$DB_USER = "nathan";
$DB_PASSWORD = "abcd";

try {
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo 'Echec de la connexion : ' . $e->getMessage();
}

?>