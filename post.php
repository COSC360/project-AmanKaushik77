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

$sql2 = "SELECT user_id FROM users WHERE is_admin = TRUE";
$res = $pdo->query($sql2);
while ($row = $res->fetch()){
  if($row['user_id'] == $uid){
    $isAdmin = TRUE;
  }else{
    $isAdmin = FALSE;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/d0c6f74c0e.js" crossorigin="anonymous"></script>
</head>
    <title>The Penalty Box - Post </title>
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
<div class ="post-sec">
    <?php 
        $pid = $_GET["post_id"];
        $_SESSION['pid'] = $pid;
        $sql = "SELECT title, body FROM posts P JOIN topics T ON T.topic_id = P.topic_id WHERE post_id =".$pid.";";
        $res = $pdo->query($sql);
        if($row = $res->fetch()){
          if($isAdmin == FALSE){
            echo "<div class = 'post'>";
            echo "<h2>".$row['title']."</h2>";
            echo "<p style = 'text-align:center'><td><button class='upvote' onclick='upvoteForum(1)'> &uarr;</button> <button class='downvote' onclick='upvoteForum(1)'>&darr;</button></td>   "  .$row['body']."</p>";
            echo "</div>";
          }else{
            echo "<div class = 'post'>";
            echo "<h2>".$row['title']."</h2>";
            echo "<p style = 'text-align:center'><td><button class='upvote' onclick='upvoteForum(1)'> &uarr;</button> <button class='downvote' onclick='upvoteForum(1)'>&darr;</button></td>   "  .$row['body']."</p>";
            echo "<form method='GET' action='deletePost.php?post_id='.$pid.>";
            echo  "<button type ='submit' placeholder ='Delete' name = 'delete' value='".$pid."'  action = 'deletePost.php?post_id='.$pid> <i class='fa-solid fa-trash'></i> </button>";
            echo "</form>";
            echo "</div>";
          }
        }
    ?>
    

	<!-- Comments -->
	<div class="comments">
		<h3>Comments</h3>
        <hr>
		<!-- Comment 1 -->
		<?php
            $pid = $_GET["post_id"];
            $sql2 = "SELECT C.comment_id, C.body, U.username FROM comments C JOIN posts P ON C.post_id = P.post_id JOIN users U ON U.user_id = C.user_id WHERE C.post_id=".$pid.";";
            $res = $pdo->query($sql2);
            while($row = $res->fetch()){
              if($isAdmin == FALSE){
                echo "<div class = 'comments'>";
                echo "<p style = 'text-align:center'><td><button class='upvote' onclick='upvoteForum(1)'> &uarr;</button> <button class='downvote' onclick='upvoteForum(1)'>&darr;</button></td><strong>From: ".$row['username'].": </strong> "  .$row['body']." </p>";
              
                echo "</div>";
              }else{
                echo "<div class = 'comments'>";
                echo "<p style = 'text-align:center'><td><button class='upvote' onclick='upvoteForum(1)'> &uarr;</button> <button class='downvote' onclick='upvoteForum(1)'>&darr;</button></td><strong>From: ".$row['username'].": </strong> "  .$row['body']." </p>";
                echo "<form method='GET' action = 'deleteComment.php?comment_id=".$row['comment_id']."&post_id=".$pid."'>";
                echo  "<button type ='submit' name ='delete' value ='".$row['comment_id']."' placeholder = 'delete' action = 'deleteComment.php?comment_id='".$row['comment_id']."> <i class='fa-solid fa-trash'></i> </button>";
                echo "</form>";
                echo "</div>";

              }
            }

            echo "<form method='GET' action='comment.php?post_id='.$pid.>";
            echo  "<input class = 'pReply' name = 'comm' type='text' placeholder='Comment'>";
            echo "</form>";

            ?>
            
        
       
	</div>
</div>

</body>
