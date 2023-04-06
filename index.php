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
    <title>The Penalty Box - Home</title>
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
        <h1>Recent Events</h1>
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
                $sql = "SELECT P.post_id, P.body, U.username, T.title FROM posts P JOIN users U ON U.user_id = P.user_id JOIN topics T ON P.topic_id = T.topic_id LIMIT 20";
                $res = $pdo->query($sql);

                while($row = $res->fetch()){
                  echo "<tr>";
                  echo "<td><form action='upvoteforum.php?post_id=".$row["post_id"]."' method='post'><button class='upvote'>&uarr;</button></form><form action='downvoteforum.php?post_id=".$row["post_id"]."' method='post'><button class='downvote'>&darr;</button></form></td>";
                  echo "<td> ".$row["title"]."</td>";
                  echo "<td> ".$row["body"]."</td>";
                  echo "<td> ".$row["username"]."</td>";
                  echo "<td><a href= post.php?post_id=".$row["post_id"]."><i class='fa-solid fa-message'></i></a></td>";
                  echo "</tr>";
                }
              
              ?>
            </tbody>
          </table>
        </div>
        <div class = "side">
            <h2>Recent Chirps</h2>
            <hr>
            <ul>
                <?php
                if($user != '' || $user != null){
                  $sql2 = "SELECT T.title, P.post_id FROM posts P JOIN topics T ON P.topic_id = T.topic_id WHERE P.user_id=".$uid.";";
                  $res = $pdo->query($sql2);
                  
                  while($row2 = $res->fetch()){
                    echo "<li><a href = post.php?post_id=".$row2["post_id"].">".$row2['title']."</a></li>";
                  }
                }else{
                  echo "<h3>Login to see your posts</h3>";
                }

                ?>
                <!-- <li><a href = #>Its hard being a Portland fan</a></li>
                <li><a href = #>Will Chelsea get Neymar?!</a></li>
                <li><a href = #>Why can't Chelsea score...</a></li>
                <li><a href = #>NBA needs to get rid of load management</a></li> -->
            </ul>
    
        </div>

        <div class = "user">
                <?php 
                
               
                if($user != null){
                echo "<h3>Hello ".$user. "!</h3>";
                }else{
                  echo "<h3>Please login to your account</h3>";
                }
                ?>


            <!-- <h2>Hello SplashBro</h2>
            <hr>
            <h3>Your Posts:</h3>
            <ul>
                <li><a href = #>Dame to the heat?</a></li>
                <li><a href = #>Chelsea will win 3 league titles after this year</a></li>
                <li><a href = #>Canada 2026 World Cup run</a></li>
                <li><a href = #>New arena in Calgary?!</a></li>
            </ul> -->
    
        </div>
    </article>

  


</body>
</html>
