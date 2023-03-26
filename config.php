<?php
// Create connection
try{
   $connString = "mysql:host=localhost;dbname=test2";
   $username = "root";
   $password = "";
   $pdo = new PDO($connString,$username,$password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}
?>