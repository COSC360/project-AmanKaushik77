<?php 
include 'config.php';
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $un = $_POST['username'];
        $pas = $_POST['password'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $un = $_GET['username'];
        $pas = $_GET['password'];
    }
  
        $sql = "SELECT * FROM users where username = '$un' AND password = '$pas';";
        $res = $pdo->query($sql);
        if($row = $res->fetch()){
            if(strcasecmp($row['username'], $un) == 0 && strcasecmp($row['password'], $pas) == 0){
                $uid = $row['user_id'];
               
                session_start();
                $_SESSION['$uid'] = $uid;
                $_SESSION['user'] = $un;
               header("Location: index.php");
               exit;
               
                
            }else{ 
                 
            }
        }
        else{
            header("Location: login.html");
        }
        $pdo = null;
        $res = null;
 

    
?>
