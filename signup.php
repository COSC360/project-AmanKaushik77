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
        $sql = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $sql->execute([$un, $email, $pas]);
        echo "<div class=\"welcome\"><h2>Welcome to the Pentalty Box, please click below and sign back using the username and password you created to start chatting!!".$un."</h2></div>";
        echo "<div class=\"returnButton\"><a href=\"login.html\">Return to Login</a></div>";
        

    }catch(PDOException $e){
        die($e->getMessage());
    }
?>
</body>

</html>



