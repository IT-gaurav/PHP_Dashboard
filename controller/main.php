<?php
// importing files
require_once 'dbconfig.php';
require_once 'functions.php';

try {

    // creating connection object with PDO class
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Controller for register function
    if (isset($_POST['register'])) {
        register($connection);
    }

    // Controller for login function
    if (isset($_POST['login'])) {
        login($connection);
    }

    // Controller for save function
    if (isset($_POST['save'])) {
        save($connection);
    }
} catch (SQLException $error) {
    echo $connection->Error[2];
}
