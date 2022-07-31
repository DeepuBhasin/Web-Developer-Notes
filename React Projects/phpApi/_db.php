<?php
require_once './util.php';
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "postman";

try {
    $conn = @mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn) {
        $status = '400';
        $message = mysqli_connect_error();
        $error = true;
        throw new Exception(response($status, $message, $error));
    }else {
        echo response('200','Connection Made Successfully',false);
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
