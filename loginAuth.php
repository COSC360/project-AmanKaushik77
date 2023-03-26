<?php 
include 'config.php';
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $un = $_POST['username'];
        $pas = $_POST['password'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $un = $_GET['username'];
        $pas = $_GET['password'];
    }
  
        $sql = "SELECT * FROM users where username = '$un' AND password = '$pas';";
        $res = $pdo->query($sql);
        if($row = $res->fetch()){
            if(strcasecmp($row['username'], $un) == 0 && strcasecmp($row['password'], $pas) == 0){
                //echo "<div class=\"welcome\"><h2>Welcome to the Pentalty Box: ".$un."</h2></div>";
       // echo "<div class=\"returnButton\"><a href=\"index.php\">Return to Homepage</a></div>";
                // echo "<p>User has valid account</p>";
                $uid = $row['user_id'];
               
                session_start();
                $_SESSION['$uid'] = $uid;
                $_SESSION['user'] = $un;
               header("Location: index.php");
               exit;
               
                
            }else{ 
                echo 
            }
        }
        $pdo = null;
        $res = null;
 

    
?>
<script >
        var php_var = "<?php echo $php_var; ?>";
</script>