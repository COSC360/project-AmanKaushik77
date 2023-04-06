<?php 
include 'config.php';
session_start();

if(isset($_SESSION['user'])&& isset($_SESSION['$uid'])) {
  $user = $_SESSION['user'];
  $uid = $_SESSION['$uid'] ;
}else{
  $user = null;
  $uid = null;
  header("location:login.html");
}

?>
<?php
    $pid = $_GET["post_id"];
    $sql = "SELECT * FROM downvotes where user_id = ? AND post_id = ?";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1,$uid);
    $statement->bindValue(2, $pid);
    $statement->execute();

    $sql3 = "SELECT * FROM upvotes where user_id = ? AND post_id = ?";
    $statement2 = $pdo->prepare($sql3);
    $statement2->bindValue(1,$uid);
    $statement2->bindValue(2, $pid);
    $statement2->execute();

    if($row = $statement->fetch()){
        $pdo = null;
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
    elseif($row2 = $statement2->fetch()){
        $sql4 = $pdo->prepare("DELETE FROM upvotes WHERE post_id=? AND user_id = ?");
        $sql4->execute([$pid,$uid]);

        $sql2 = $pdo->prepare("INSERT INTO downvotes (post_id, user_id) VALUES (?, ?)");
        $sql2->execute([$pid,$uid]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $pdo = null;
    }
    else{
        $sql2 = $pdo->prepare("INSERT INTO downvotes (post_id, user_id) VALUES (?, ?)");
        $sql2->execute([$pid,$uid]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $pdo = null;
    }
?>
