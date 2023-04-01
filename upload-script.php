<?php

include_once "../Connection/connection.php";
$con = connection();



$statusMsg = '';

// File upload directory
$target_dir = "uploads/";



if(isset($_POST["submit"])) {
  if(!empty($_FILES["file"]["name"])){

    $fileName = basename($_FILES['file']['name']);
    $targetFilePath =  $target_dir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','JPG','PNG','JPEG');
    if(in_array($fileType, $allowTypes)){

      //Upload file to server
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

        // Insert image file name into database
        $insert = "INSERT INTO `gallery`(`img_file`, `upload_time`) VALUES ('".$fileName."', NOW())";
        $config = $con->query($insert) or die ($con->error);

        // Upload Status Message
        if($config){
          sleep(1.5);
          $statusMsg = "The file" . $fileName . " has been uploaded succesfully.";
          echo header("Location: index.php");
        }else{
           $statusMsg = "File upload failed, please try again.";
        }
      }else{
        $statusMsg = "Sorry, there was an error in uploading your file.";
      }
    }else{
      $statusMsg = "Sorry, only jpg, png & jpeg file extension are allowed.";
    }
  }else{
    $statusMsg = "Please select a file to upload";
  }
}

?>






<!-- https://youtu.be/z_HBPA6Zg9k -->
<!-- Code Reference -->