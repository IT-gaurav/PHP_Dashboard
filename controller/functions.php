<?php

require_once "../model/User.php";

$dashboard = '../view/dashboard.php';

session_start();

function register($connection){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $user = new User($fname,$lname,$email,$pass);

    $response = $user->register($connection);

    if ($response) {
        $_SESSION['user'] = $user;
        header("Location: " . $GLOBALS['dashboard']);
    }else{
        echo "Error";
    }
}

function login($connection){
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $temp_user = new User();
    $temp_user->setEmail($email);

    $found = $temp_user->findUser($connection);

    if ($found) {
        $tempPass = $temp_user->getPass();
        if ($pass == $tempPass) {
            $temp_user->setPass(null);
            $_SESSION['user'] = $temp_user;
            header("Location: " . $GLOBALS['dashboard']);
        }else{
            echo "Error";
        }
    }
}


function save($connection){
    $user = $_SESSION['user'];
    $response = $user->save($connection);

    if ($response) {
        $_SESSION['user'] = $user;
        header("Location: " . $GLOBALS['dashboard']);
    }else{
        echo "Error";
    }

}