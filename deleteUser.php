<?php 

include 'config.php';
session_start();
// $user = $_SESSION['user'];
// $uid = $_SESSION['$uid'] ;

if(isset($_SESSION['user'])&& isset($_SESSION['$uid'])) {
  $user = $_SESSION['user'];
  $uid = $_SESSION['$uid'] ;
}else{
  $user = null;
  $uid = null;
}




    $ban = $_GET["user_id"];




$sql = $pdo->prepare("DELETE FROM users WHERE user_id = ?;");
$sql->execute([$ban]);
header("Location: index.php");
    exit;





?>