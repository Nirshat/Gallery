<?php
  function connection(){
    $host = ""; // put localhost for scratch
    $username = ""; // username of server used
    $password = ""; // password of server used
    $database = ""; // name of database
  

    $con = new mysqli($host, $username, $password, $database);

    if($con->connect_error){
      echo $con->connect_error;
    }
    else{
      return $con;
    }
  }
?>
