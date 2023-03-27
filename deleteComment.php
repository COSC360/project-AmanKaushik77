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

$pid = $_SESSION['pid'];


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cid = $_GET["delete"];
}



$sql = $pdo->prepare("DELETE FROM comments WHERE comment_id = ?;");
$sql->execute([$cid]);
header("Location: post.php?post_id=".$pid);
    exit;





?>