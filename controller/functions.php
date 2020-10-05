<?php

require_once "../model/User.php";

$dashboard = '../view/dashboard.php';

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
            $_SESSION['user'] = $user;
            header("Location: " . $GLOBALS['dashboard']);
        }else{
            echo "Error";
        }
    }
}


function save($connection){

  //Had to change this path to point to IOFactory.php.
  //Do not change the contents of the PHPExcel-1.8 folder at all.
  include('./PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

  //Use whatever path to an Excel file you need.
  $inputFileName = realpath($_POST['file']);

  echo $inputFileName;

  try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
  } catch (Exception $e) {
    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . 
        $e->getMessage());
  }

  $sheet = $objPHPExcel->getSheet(0);
  $highestRow = $sheet->getHighestRow();
  $highestColumn = $sheet->getHighestColumn();

  for ($row = 1; $row <= $highestRow; $row++) { 
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, 
                                    null, true, false);


    //Prints out data in each row.
    //Replace this with whatever you want to do with the data.
    // echo '<pre>';
      print_r($rowData);

    //  echo json_encode($rowData);

    // echo '</pre>';

  }

    
}