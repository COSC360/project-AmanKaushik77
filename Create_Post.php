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
            <input type="text" placeholder="Search">
            <hr>
            <ul>
                <li><i class="fa-solid fa-house"></i><a href = "index.html"> Home</a></li>
                <li><i class="fa-solid fa-user"></i><a href = "profile.php"> Profile</a></li>
                <li><i class="fa-solid fa-fire"></i><a href = "trending.html"> Trending</a></li>
                <li><i class="fa-solid fa-right-to-bracket"></i><a href = "login.html"> Login</a></li>
            </ul>
        </nav>
    </header>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pt = $_POST['post_title'];
        $pc = $_POST['post_content'];
        $pf = $_POST['post_forum'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $pt = $_GET['post_title'];
        $pc = $_GET['post_content'];
        $pf = $_GET['post_forum'];
    }
    switch($pf){
        case "NBA":
            $tid = 1;
            break;
        case "NHL":
            $tid = 1;
            break;
        case "Football/Soccer":
            $tid = 1;
            break;
        case "NFL":
            $tid = 1;
            break;
        case "Volleyball":
            $tid = 1;
            break;
        case "MLB":
            $tid = 1;
            break;
        case "Formula 1":
            $tid = 1;
            break;


    }
        $sql = "INSERT INTO topics (title, created_by) VALUES (?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(1,$pt);
        $statement->bindValue(2, $_SESSION['$uid']);
        $statement->execute();
        $sql3 = "SELECT MAX(topic_id) as topic_id1 FROM topics WHERE created_by =".$_SESSION['$uid'].";";
        $res = $pdo->query($sql3);
        while ($row = $res->fetch()){
            $tid2 = $row['topic_id1'];
            $sql2 = $pdo->prepare("INSERT INTO posts(user_id, body, topic_id) VALUES (?, ?, ?)");
            $sql2->execute([$_SESSION['$uid'], $pc, $tid2]);
            echo "<div class=\"welcome\"><h2>Post successful! </h2></div>";
            echo "<div class=\"returnButton\"><a href=\"index.php\">Return to Homepage</a></div>";
        }

        



?>
</body>

</html>
