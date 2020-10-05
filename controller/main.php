<?php

require_once 'dbconfig.php';
require_once 'functions.php';

try{

    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    if (isset($_POST['register'])) {
        register($connection);
    }

    if (isset($_POST['login'])) {
        login($connection);
    }

    if (isset($_POST['save'])) {
        save($connection);
    }

}catch(SQLException $error){
    echo $connection->Error[2];
}