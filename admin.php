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

    <article  class = "container">
        <div style=" height : 40em; overflow-y: scroll;" class="recent">
        <h1>Penalty Box Users</h1>
        <table >
            <thead>
              <tr>
                <th>Profile Pic</th>
                <th>UserId</th>
                <th>Username</th>
                <th>Email</th>
                <th>Check Profile</th>
                <th>Ban</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT I.contentType, I.image, U.user_id, U.username, U.email FROM users U LEFT OUTER JOIN userimages I ON U.user_id = I.user_id";
                $res = $pdo->query($sql);

                while($row = $res->fetch()){
                    echo "<tr>";
                   echo "<td>";
                    if($row['contentType'] ==null){
                        echo '<img width = 150px; style="border-radius: 70%;" src="uploads/default.png"/>';
                    } else{
                        echo '<img width = 150px; style="border-radius: 70%;" src="data:image/'.$row['contentType'].';base64,'.base64_encode($row['image']).'"/>';

                    }  
                    
                    echo "</td>";
                    echo "<td> ".$row["user_id"]."</td>";
                    echo "<td> ".$row["username"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td><a href= otherUsers.php?user_id=".$row["user_id"]."><i class='fa-solid fa-user'></i></a></td>";
                    echo "<td><a href='deleteUser.php?user_id=".$row['user_id']."'> <i class='fa-solid fa-ban'></i> </a> </td>";
                    echo "</tr>";
                }
              
              ?>
            </tbody>
          </table>
        </div>
        <div class = "side">
            <h2>Total Amounts</h2>
            <hr>
            <ul>
                <?php
                $total = 0;
                $totalU = 0;
                $sq = "SELECT COUNT(user_id) AS totalUsers FROM users;";
                $res = $pdo->query($sq);
                while($row = $res->fetch()){
                    $totalU = $row['totalUsers'];
                   }
                   echo "<h1> Total amount of Users: ".$totalU."</h1>";
                  $sql2 = "SELECT COUNT(post_id) AS totalPosts FROM posts;";
                  $res = $pdo->query($sql2);
                  
                  while($row2 = $res->fetch()){
                   $total = $row2['totalPosts'];
                  }
                  echo "<h1> Total amount of posts: ".$total."</h1>";
              
            

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
                  include 'showpfp.php';
                echo "<h3>Hello ".$user. "!</h3>";
                }else{
                  echo "<h3>Please login to your account</h3>";
                }

                $sql7 = "SELECT user_id FROM users WHERE is_admin = TRUE";
                $res = $pdo->query($sql7);
                while ($row = $res->fetch()){
                  if($row['user_id'] == $uid){
                    $isAdmin = TRUE;
                  }else{
                    $isAdmin = FALSE;
                  }
                }

                if ($isAdmin){
                  echo "<a style = 'text-decoration: underline' href='admin.php'> Admin Page </a>";
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