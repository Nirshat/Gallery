<?php
    include_once "../Connection/connection.php";
    $con = connection();



    if(isset($_POST['terminator'])){

        // Delete the file in directory
        $fileName = $_POST['file_name'];
        $file = fopen("$fileName", "r");
        fclose($file);
        unlink($fileName);

        // Delete the file in Database
        $ref_code = $_POST['img_code'];
        $query = "DELETE FROM `gallery` WHERE `img_code` = '$ref_code' ";
        $con->query($query) or die ($con->error);
        sleep(1);




        echo header("Location: index.php");

    }
    

?>