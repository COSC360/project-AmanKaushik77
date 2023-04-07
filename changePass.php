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

$newPass = $_POST['password'];

$sql2 = "UPDATE users SET password = ? WHERE user_id = ?";
        $res = $pdo->prepare($sql2);
        $res->bindValue(1,md5($newPass));
        $res->bindValue(2, $uid);
        $res->execute();
        
            header("Location:index.php");
            exit;
      
?>
