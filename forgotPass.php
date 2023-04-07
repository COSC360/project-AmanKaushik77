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

$un = $_POST['username'];
$email = $_POST['email'];

$sql2 = "SELECT username, email, user_id FROM users WHERE username=? AND email=?";
        $res = $pdo->prepare($sql2);
        $res->bindValue(1,$un);
        $res->bindValue(2, $email);
        $res->execute();

        if( $row = $res->fetch()){ 
            $_SESSION['$uid'] = $row['user_id'];
            $_SESSION['user'] = $un;
            header("Location:changePass.html");
            exit;
        }else{
          echo "User not found";
          echo "<a href='login.html'>Login Page</a>";
        }
?>
