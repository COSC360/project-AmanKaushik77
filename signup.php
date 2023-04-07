<?php 
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./css/styles.css">
</head>
<body style="margin-top:5em">
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $un = $_POST['username'];
        $pas = $_POST['password'];
        $email = $_POST['email'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $un = $_GET['username'];
        $pas = $_GET['password'];
        $email = $_GET['email'];
    }
    try{
        $sql2 = "SELECT username, email FROM users WHERE username=? OR email=?";
        $res = $pdo->prepare($sql2);
        $res->bindValue(1,$un);
        $res->bindValue(2, $email);
        $res->execute();

        if( $row = $res->fetch()){
            echo "Username or Email has already been used please try again";
            echo "<a href=login.html> Try again</a>";
        }else{
            $sql = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $sql->execute([$un, $email, $pas]);
            echo "<div class=\"welcome\"><h2>Welcome to the Pentalty Box, please click below and sign back using the username and password you created to start chatting!!".$un."</h2></div>";
            echo "<div class=\"returnButton\"><a href=\"login.html\">Return to Login</a></div>";
        }

    }catch(PDOException $e){
        die($e->getMessage());
    }
?>
</body>

</html>


