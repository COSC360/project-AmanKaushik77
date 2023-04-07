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



   // $isUser = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imagedata = file_get_contents($_FILES['fileToUpload']['tmp_name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
            $uploadOk = 0;
          }
          if ($_FILES["fileToUpload"]["size"] > 100000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
                $null = NULL;
                //store the contents of the files in memory in preparation for upload
                $sql = $pdo->prepare("INSERT INTO userImages (user_id, contentType, image) VALUES(?,?,?)");

                $sql->execute([$uid, $imageFileType, $imagedata]);
               
                header("Location: profile.php");
                exit;  
            
        
        
    
        


   


?>