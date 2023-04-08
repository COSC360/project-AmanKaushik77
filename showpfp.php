<?php 
include 'config.php';

// $user = $_SESSION['user'];
// $uid = $_SESSION['$uid'] ;

if(isset($_SESSION['user'])&& isset($_SESSION['$uid'])) {
  $user = $_SESSION['user'];
  $uid = $_SESSION['$uid'] ;
  
}else{
  $user = null;
  $uid = null;
}
try{
        $sql = "SELECT contentType, image FROM userImages where user_id=".$uid;
        // build the prepared statement SELECTing on the userID for the user
        $res = $pdo->query($sql);
        

        
        if($row = $res->fetch()){
          echo '<img width = 150px; style="border-radius: 70%;" src="data:image/'.$row['contentType'].';base64,'.base64_encode($row['image']).'"/>';
        }else {
          echo '<img width = 150px; style="border-radius: 70%;" src="uploads/default.png"/>';
        }
        
      }catch(Exception $e){
        echo '<img width = 150px; style="border-radius: 70%;" src="uploads/default.png"/>';
      }
        
        ?>
