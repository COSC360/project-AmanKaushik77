<?php 

include 'config.php';

session_start();
$user = $_SESSION['user'];
$uid = $_SESSION['$uid'] ;
$pid = $_SESSION['pid'] ;



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $comm = $_GET['comm'];
}

if($user != null||$user != ''){
    $sql =  $pdo->prepare("INSERT INTO comments (post_id, user_id, body, updated_at) VALUES (?, ?, ?, NOW());");
    $sql->execute([$pid, $uid, $comm]);
    header("Location: post.php?post_id=".$pid);
    exit;
}else{
    header("Location: post.php?post_id=".$pid);
    exit;
}

//hello
?>
