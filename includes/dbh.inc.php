<?php

  $serverName = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "phpproject";



  $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);


  if (!$conn){
    die("CONNECTION FAILED: ".mysqli_connect_error());

  }
