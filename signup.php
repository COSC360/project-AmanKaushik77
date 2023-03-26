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
   
    // if(username == null || password == null)
	// 			return null;
	// 	if((username.length() == 0) || (password.length() == 0))
	// 			return null;

    try{
        $sql = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $sql->execute([$un, $email, $pas]);
        echo "<div class=\"welcome\"><h2>Welcome to the Pentalty Box: ".$un."</h2></div>";
        echo "<div class=\"returnButton\"><a href=\"index.php\">Return to Homepage</a></div>";
        

    }catch(PDOException $e){
        die($e->getMessage());
    }
?>
</body>
</html>