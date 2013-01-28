<?php
require_once 'environment.php';

//connect to db
try {
    $db = new PDO(DB_DRIVER.":host=localhost;dbname=".$dbName, $dbUser, $dbPw);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//remove db user and pass variables so that they won't be accidentially used later
unset($dbPw, $dbUser);