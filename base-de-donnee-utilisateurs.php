<?php
    define('DB_HOST', '127.0.0.1'); // use ip address instead of `localhost`
// existing user that has permission to create database and grant access
define('DB_ROOT_USER', 'root');
define('DB_ROOT_PASS', '');

// the database you want to create
$dbname = 'utilisateurs';
// specific user for this particular database
$dbuser = 'user';
$dbpass = 'password';

try {
    // login with root user
    $dbh = new PDO('mysql:host='.DB_HOST, DB_ROOT_USER, DB_ROOT_PASS);

    // create database
    $dbh->exec(
        "CREATE DATABASE `$dbname`;
        CREATE USER '$dbuser'@'localhost' IDENTIFIED BY '$dbpass';
        GRANT ALL ON `$dbname`.* TO '$dbuser'@'localhost';
        FLUSH PRIVILEGES;")
    or die(print_r($dbh->errorInfo(), true));
    $verifier = fopen('valeur_utilisateurs.txt','r+');
    fseek($verifier, 0);
    fputs($verifier,'     ');
    fseek($verifier, 0);
    fputs($verifier, 'true ');
    fclose($verifier);

    // use database
    $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.$dbname, DB_ROOT_USER, DB_ROOT_PASS);


} catch (PDOException $e) {
    die("DB ERROR: ". $e->getMessage());
}


?>