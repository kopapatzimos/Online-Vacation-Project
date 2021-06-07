<?php

  $serverName = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "emaildb";



  $con_e = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);


  if (!$con_e){
    die("CONNECTION FAILED: ".mysqli_connect_error());

  }
