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

    <div class="trend-container">
        <h1>Trending Topics <i style="color:black; background-color: #ffbe0b " class="fa-sharp fa-solid fa-fire"></i></h1>
        <table>
      <thead>
        <tr>
            <th>Votes</th>
          <th>Topic</th>
          <th>Upvotes</th>
        </tr>
      </thead>
      <tbody>
      <?php
                $sql = "SELECT COUNT(*) AS totalUpvotes, P.body, P.post_id FROM posts P JOIN upvotes U ON P.post_id = U.post_id GROUP BY U.post_id ORDER BY totalUpvotes DESC ";
                $res = $pdo->query($sql);

                while($row = $res->fetch()){
                  echo "<tr>";
                  echo "<td><button class='upvote' onclick='upvoteForum(1)'> &uarr;</button> <button class='downvote' onclick='upvoteForum(1)'>&darr;</button></td>";
                  echo "<td> <a href= post.php?post_id=".$row["post_id"].">".$row["body"]."</a></td>";
                  echo "<td> ".$row["totalUpvotes"]."</td>";
                  echo "</tr>";
                }
                $pdo = null;
                $res = null;
              ?>
      </tbody>
    </table>
      </div>


</body>
