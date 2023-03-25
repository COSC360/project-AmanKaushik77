<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $un = $_POST['username'];
        $pas = $_POST['password'];
        $email = $_POST['email']
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $un = $_GET['username'];
        $pas = $_GET['password'];
        $email = $_GET['email'];
    }
    try 
    if(username == null || password == null)
				return null;
		if((username.length() == 0) || (password.length() == 0))
				return null;

    try(
        $connString = "mysql:host=localhost;dbname=bookcrm";
        $user = "testuser";
        $pass = "mypassword";
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT users(username, email, password) VALUES (" +$un+ ", "+$email+", "+$pass+");"
        $result = $pdo->query($sql);
        
    )
    catch(PDOException $e){
        die($e->getMessage());
    }
?>