<?php
// Create connection
try{
   $connString = "mysql:host=cosc360.ok.ubc.ca;dbname=db_68952928";
   $username = "68952928";
   $password = "68952928";
   $pdo = new PDO($connString,$username,$password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}
?>
