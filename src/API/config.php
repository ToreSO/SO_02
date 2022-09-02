<?php
///////////////////////////////////////////////////// MYSQL/////////////////////////////////////////////////////////////////////////
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST,PUT');
header('Access-Control-Allow-Headers: * ');
header("content-type:application/json");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_commission";

///////////////////////////////////////////////////// MYSQL/////////////////////////////////////////////////////////////////////////
try{
    $conn = new PDO( "mysql:host=$servername;dbname = $dbname",$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));  
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Faild to Connect to database" . $e->getMessage();
}
///////////////////////////////////////////////////// MYSQL/////////////////////////////////////////////////////////////////////////
?>