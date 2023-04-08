<?php
// Create connection
try{
    echo "<h1> Attempting to connect to the database </h1>";
   $connString = "mysql:host=cosc360.ok.ubc.ca;dbname=db_68952928";
   $username = "68952928";
   $password = "68952928";
   $pdo = new PDO($connString,$username,$password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "<h1>Sucessfully connected! :D </h1>";
}catch(PDOException $e){
   die('Unable to connect with the database');
}

$sql = "SELECT * FROM users;";

$res = $pdo->query($sql);
echo "<h3> proof: </h3>";
while($row = $res->fetch()){
    echo "<p>- ".$row['user_id']." - ".$row['username']."</p>";
}


?>
