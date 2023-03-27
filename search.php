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
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Penalty Box - Search Results</title>
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
                <li><i class="fa-solid fa-user"></i><a href = "profile.php"> Profile</a></li>
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

    <article class = "container">
        <div class="recent">
        <h1>Search Results</h1>
        <table>
            <thead>
              <tr>
                <th>Votes</th>
                <th>Topic</th>
                <th>Title</th>
                <th>User</th>
                <th>Dive In!</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $search = $_GET["search"];
            }

            if($search == "" || $search == null) {
                $sql = "SELECT P.post_id, P.body, U.username, T.title FROM posts P JOIN users U ON U.user_id = P.user_id JOIN topics T ON P.topic_id = T.topic_id LIMIT 10";
                
                $res = $pdo->query($sql);

                while($row = $res->fetch()){
                  echo "<tr>";
                  echo "<td><button class='upvote' onclick='upvoteForum(1)'> &uarr;</button> <button class='downvote' onclick='upvoteForum(1)'>&darr;</button></td>";
                  echo "<td> ".$row["title"]."</td>";
                  echo "<td> ".$row["body"]."</td>";
                  echo "<td> ".$row["username"]."</td>";
                  echo "<td><a href= post.php?post_id=".$row["post_id"]."><i class='fa-solid fa-message'></i></a></td>";
                  echo "</tr>";
                }
                $pdo = null;
                $res = null;
            }else{
                $sql = "SELECT P.post_id, P.body, U.username, T.title FROM posts P JOIN users U ON U.user_id = P.user_id JOIN topics T ON P.topic_id = T.topic_id WHERE P.body LIKE '%".$search."%' OR T.title LIKE '%".$search."%' OR P.body LIKE '".$search."%' OR T.title LIKE '".$search."%';";
                $res = $pdo->query($sql);

                while($row = $res->fetch()){
                  echo "<tr>";
                  echo "<td><button class='upvote' onclick='upvoteForum(1)'> &uarr;</button> <button class='downvote' onclick='upvoteForum(1)'>&darr;</button></td>";
                  echo "<td> ".$row["title"]."</td>";
                  echo "<td> ".$row["body"]."</td>";
                  echo "<td> ".$row["username"]."</td>";
                  echo "<td><a href= post.php?post_id=".$row["post_id"]."><i class='fa-solid fa-message'></i></a></td>";
                  echo "</tr>";
                }
                $pdo = null;
                $res = null;
            }
              ?>
            </tbody>
          </table>

          </body>
</html>
