<?php 

include 'config.php';
session_start();
if(isset($_SESSION['user'])&& isset($_SESSION['$uid'])) {
    $user = $_SESSION['user'];
    $uid = $_SESSION['$uid'] ;
    
  }else{
    $user = null;
    $uid = null;
  }
// $user = $_SESSION['user'];
// $uid = $_SESSION['$uid'] ;
$id = $_GET["user_id"];

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
        
        $sql = "SELECT U.user_id, U.username, U.email, U.updated_at, COUNT(P.post_id) as numPost FROM users U JOIN posts P ON U.user_id = P.user_id WHERE U.user_id = ".$id;
        $res = $pdo->query($sql);
        while($row = $res->fetch()){
        $username = $row['username'];
        $email = $row['email'];
        $updated = $row['updated_at'];
        $numPost = $row['numPost'];
        }
        ?>
        <form method="POST" action="profilePic.php"  enctype="multipart/form-data" >
         Upload a profile picture:
          <br>
          <input type="file" name="fileToUpload" id="fileToUpload" required>
          <br>
          <input type="submit" value="Change profile picture" name = "submit">
        </form>
        <?php 
           $sql = "SELECT contentType, image FROM userImages where user_id=".$id;
           // build the prepared statement SELECTing on the userID for the user
           $res = $pdo->query($sql);
           
   
           
           if($row = $res->fetch()){
             echo '<img width = 150px; style="border-radius: 70%;" src="data:image/'.$row['contentType'].';base64,'.base64_encode($row['image']).'"/>';
           }else {
             echo '<img width = 150px; style="border-radius: 70%;" src="uploads/default.png"/>';
           }
        ?>
        
        <h2><?php echo $username ?></h2>
        <p>Email: <?php echo $email ?> </p>
        <p>Last Active: <?php echo $updated ?></p>
        <p>Total Posts: <?php echo $numPost ?></p>

    </div>
    <div class = "proContain">
        <table class="recent-posts">
            <h2><?php echo $username?> Posts!</h2>
            <thead>
              <tr>
                <th>Post Title</th>
                <th>Date Updated</th>
                <th>Comments</th>
              </tr>
            </thead>
            <tbody>
        <?php
            $sql = "SELECT U.user_id, P.body, P.updated_at, P.post_id FROM users U JOIN posts P ON  P.user_id = U.user_id  WHERE U.user_id = ".$id.";";
            $res = $pdo->query($sql);
            while($row = $res->fetch()){
                $sql3 = "SELECT COUNT(comment_id) as comment_id1 FROM comments WHERE post_id =".$row['post_id'].";";
                $res2 = $pdo->query($sql3);
                while ($row2 = $res2->fetch()){
                    $numcom = $row2['comment_id1'];
                }
                echo "<tr>";
                echo    "<td><a href='post.php?post_id=".$row["post_id"]."'>".$row['body']."</a></td>";
                echo    "<td>".$row['updated_at']."</td>";
                echo    "<td><a href='#'>".$numcom."</a></td>";
                echo "</tr>";
            }
        ?>
            </tbody>
        </table>

        </div>
    
    
    
</body>
</html>
