<?php
  if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confpassword = $_POST["confpassword"];
    $usertype =$_POST["usertype"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputsSignup($firstname, $lastname, $email ,$password,$confpassword,$usertype)){
      header("location:../signup.php?error=emptyinput");
      exit();
    }
    if(invalidEmail($email)){
      header("location:../signup.php?error=indvalidemail");
      exit();
    }
    if(invalidpassword($password, $confpassword)){
      header("location:../signup.php?error=indvalidwrongpassword");
      exit();
    }
    if (emailexists($conn, $email)){
      header("location:../signup.php?error=emailexists");
      exit();
    }

    if (notUserType($usertype)){
      header("location:../signup.php?error=notusertype");
      exit();

    }
    createUser($conn, $firstname, $lastname, $email, $password, $usertype);



  }
  else{
    header("location: ../signup.php");
  }
 ?>
