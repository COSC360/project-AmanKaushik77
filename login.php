
<?php 
include 'config.php';
session_start();
$user = $_SESSION['user'];
$uid = $_SESSION['$uid'] ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Penalty Box - Trending</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/d0c6f74c0e.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class = "navbar">
            <h1>The Penalty Box</h1>
            <img class = "logo" src = "Penalty.png" width="100em" height="100em">
            <form action="search.php" method="GET">
                <input type="text" name = "search" placeholder="Search">
              </form>
            <hr>
            <ul>
                <li><i class="fa-solid fa-house"></i><a href = "index.php"> Home</a></li>
                <li><i class="fa-solid fa-user"></i><a href = "profile.html"> Profile</a></li>
                <li><i class="fa-solid fa-fire"></i><a href = "trending.php"> Trending</a></li>
                <?php
                  if($user == '' || $user == null){
                    echo " <li><i class='fa-solid fa-right-to-bracket'></i><a href = 'login.html'> Login</a></li>";
                  }else{
                    echo " <li><i class='fa-solid fa-right-to-bracket'></i><a href = 'logout.php'> Logout</a></li>";
                  }
                ?>
               
            </ul>
        </nav>
    </header>

    <div class = "login">
        <h2>Login to your account!</h2>
        <form action="loginAuth.php" method="get">
            <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            </p>
            <p>
            <label for="password">Password:</label>
            <input type="password" id="post-content" name="password" required></input>
            </p>
            
            <button type="submit" value="Submit">Submit</button>
          </form>

    </div>
    <h1 style="text-align:center; color:white">OR</h1>

    <div class = "Sign-up">
        <h2>Sign-up!</h2>
        <form action="signup.php" method="post">
            <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required></input>
                </p>
            <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required></input>
            </p>
            <p>
                <label for="City">City:</label>
                <input type="text" id="city" name="city" required></input>
            </p>

            
            <button type="submit">Sign-up!</button>
          </form>

    </div>
</body>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $un = $_POST['username'];
        $pas = $_POST['password'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $un = $_GET['username'];
        $pas = $_GET['password'];
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

        $sql = "select * from users where username = ? and password = ?"
        $result = $pdo->query($sql);

        while($row = $result->fetch()){
            if ($un = username && $fn == password){
                
            }
        }
    )
    catch(PDOException $e){
        die($e->getMessage());
    }
?>

