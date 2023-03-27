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



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pid = $_GET["delete"];
}


$sql = $pdo->prepare("DELETE FROM posts WHERE post_id = ?;");
$sql->execute([$pid]);
header("Location: index.php");
    exit;



?>