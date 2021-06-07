<?php
  if(isset($_POST["submit"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $usertype =$_POST["usertype"];
    $id = $_POST["custId"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $usersId = viewUsersId($conn);
    for($i=0; $i<count($usersId); $i++){
        if ($id == $usersId[$i]) {
            if (emptyInputUpdate($firstname, $lastname, $email, $usertype)){
              header("location:../view_profile.php?id=$usersId[$i]");

              exit();
            }
            if(invalidEmail($email)){
              header("location:../view_profile.php?id=$usersId[$i]");

              exit();

            }

          }
          updateUser($conn, $firstname, $lastname,$email, $usertype, $id);
      }



  }
