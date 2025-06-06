<?php require 'config.php';
$conn = mysqli_connect($server, $user, $pass, $db_name);
if(!$conn){
    $sql = 'create database if not exists pazuri_roses ';
    mysqli_query($conn, $sql);
    // echo "Database Created Successfully!";
}else{
    // echo "Database Already Exists!";
}
?>