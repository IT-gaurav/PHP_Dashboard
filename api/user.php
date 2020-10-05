<?php

require_once '../controller/dbconfig.php';

header("Content-Type:application/json");
if (isset($_GET['email']))
{
    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $email = $_GET['email'];
    $sql = "SELECT excel_file FROM users WHERE email =?";

    $prepare = $connection->prepare($sql);
    $prepare->execute([$email]);
    $result = $prepare->fetch();

    if ($result != null) {
        $file =  response($result['excel_file'],200,"Data Fetched");
    }else{
        response(NULL, NULL, 200,"No Record Found");
    }
}
else
{
    response(NULL, NULL, 400,"Invalid Request");
}

function response($file,$response_code,$response_desc)
{
 $response['file'] = $file;
 $response['response_code'] = $response_code;
 $response['response_desc'] = $response_desc;
 
 $json_response = json_encode($response);
 echo $json_response;
}
