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
    <title>The Penalty Box - Profile</title>
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
    <div class="profile-overview">
        <?php
        if(is_null($uid)){
        header("Location: login.html");
        exit;
        }
        $sql = "SELECT U.user_id, U.email, U.updated_at, COUNT(P.post_id) as numPost FROM users U JOIN posts P ON U.user_id = P.user_id WHERE U.user_id = ".$_SESSION['$uid'].";";
        $res = $pdo->query($sql);
        while($row = $res->fetch()){
        $_SESSION['email'] = $row['email'];
        $updated = $row['updated_at'];
        $numPost = $row['numPost'];
        }
        ?>
        <img src="user-avatar.jpg" alt="User Avatar">
        <h2><?php echo $_SESSION['user'] ?></h2>
        <p>Email: <?php echo $_SESSION['email'] ?> </p>
        <p>Last Active: <?php echo $updated ?></p>
        <p>Total Posts: <?php echo $numPost ?></p>

    </div>
    <div class = "proContain">
        <table class="recent-posts">
            <h2>Your Posts!</h2>
            <thead>
              <tr>
                <th>Post Title</th>
                <th>Date Updated</th>
                <th>Comments</th>
              </tr>
            </thead>
            <tbody>
        <?php
            $sql = "SELECT U.user_id, P.body, P.updated_at, P.post_id FROM users U JOIN posts P ON  P.user_id = U.user_id  WHERE U.user_id = ".$_SESSION['$uid'].";";
            $res = $pdo->query($sql);
            while($row = $res->fetch()){
                $sql3 = "SELECT COUNT(comment_id) as comment_id1 FROM comments WHERE post_id =".$row['post_id'].";";
                $res2 = $pdo->query($sql3);
                while ($row2 = $res2->fetch()){
                    $numcom = $row2['comment_id1'];
                }
                echo "<tr>";
                echo    "<td><a href='#'>".$row['body']."</a></td>";
                echo    "<td>".$row['updated_at']."</td>";
                echo    "<td><a href='#'>".$numcom."</a></td>";
                echo "</tr>";
            }
        ?>
            </tbody>
        </table>

        </div>
    
    <div class = "create-post">
        <h1>Create a Post!</h1>
        <form action="Create_Post.php" method="get">
            <p>
            <label for="post_title">Post Title:</label>
            <input type="text" id="post_title" name="post_title" required>
            </p>
            <label for="post_content">Post Content:</label>
            <textarea id="post_content" name="post_content" required></textarea>
            </p>
            <p>
            <label for="post_forum">Select a Forum:</label>
            <select id="post_forum" name="post_forum" required>
              <option value="">--Select a Topic--</option>
              <option value="NBA">NBA</option>
              <option value="NHL">NHL</option>
              <option value="Football/Soccer">Football/soccer</option>
              <option value="NFL">NFL</option>
              <option value="Volleyball">Volleyball</option>
              <option value="MLB">MLB</option>
              <option value="F1">Formula 1</option>
            </select>
            </p>
            <button type="submit">Submit Post</button>
          </form>
          
          
          
          
          
    </div>
    
</body>
</html>
