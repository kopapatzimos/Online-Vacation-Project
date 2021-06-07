<?php
#-----SIGN UP FUNCTIONS----
function emptyInputsSignup($firstname, $lastname, $email ,$password,$confpassword,$usertype){
  if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confpassword) || empty($usertype)) {
    return  True;
  }
  else{
    return  False;
  }

}

function invalidEmail($email){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return  true;
  }
  else{
    return  false;
  }
}

function invalidpassword($password, $confpassword){
  if ($password != $confpassword) {
    return True;
  }else{
    return False;
  }
}

function notUserType($usertype){
  if (($usertype== "Admin") ||( $usertype== "Employee")) {
    return False;
  }
  else {
    return True;
  }

}

function emailexists($conn, $email){

  $sql = "SELECT * FROM users WHERE usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../signup.php?error=stmtfailed");
  }
  mysqli_stmt_bind_param($stmt,"s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);
  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $lastname, $email, $password, $usertype){

  $sql = "INSERT INTO users(usersFirstName,usersLastName,usersEmail,usersPassword,usersType) VALUES(?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../signup.php?error=stmtfailed");
    exit();
  }
  $hasedPassword = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt,"sssss",$firstname, $lastname, $email, $hasedPassword,$usertype);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location:../admin_index.php?");
  exit();
}

#-----SIGN UP FUNCTIONS----


#-----SIGN IN FUNCTIONS----

function emptyInputSignin($email ,$password){
  if (empty($email) || empty($password)) {
    return  True;
  }
  else{
    return  False;
  }

}

function loginUser($conn, $email, $password){
  $emailExists = emailexists($conn, $email);
  if ($emailExists == false) {
    header("location:../signin.php?error=wronglogin");
    exit();
  }
  $passwordHashed = $emailExists["usersPassword"];
  $checkPassword = password_verify($password, $passwordHashed);

  if ($checkPassword == false) {
    header("location:../signin.php?error=wronglogin");
    exit();
  }
  elseif($checkPassword == true){
    session_start();
    $_SESSION["userid"] = $emailExists["usersId"] ;
    $_SESSION["useremail"] = $emailExists["usersEmail"] ;
    $logid = $emailExists["usersId"];
    if ($emailExists["usersType"]=="Admin") {
      header("location:../admin_index.php?");
      exit();
    }
    elseif($emailExists["usersType"]=="Employee")
      header("location:../employee_index.php?logged=$logid");
      exit();


  }

}

#-----SIGN IN FUNCTIONS----


#----VIEW USERS FIELDS FROM DB-----

function viewUsersFirstNames($conn){
  $i=0;
  $names = [];
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $names[$i] = $row["usersFirstName"];
        $i++;

    }
  }
  return $names;
  mysqli_stmt_close($stmt);

}

function viewUsersLastNames($conn){
  $i=0;
  $names = [];
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $names[$i] = $row["usersLastName"];
        $i++;

    }
  }
  return $names;
  mysqli_stmt_close($stmt);

}

function viewUsersEmails($conn){
  $i=0;
  $names = [];
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $names[$i] = $row["usersEmail"];
        $i++;

    }
  }
  return $names;
  mysqli_stmt_close($stmt);

}

function viewUsersType($conn){
  $i=0;
  $names = [];
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $names[$i] = $row["usersType"];
        $i++;

    }
  }
  return $names;
  mysqli_stmt_close($stmt);

}

function viewUsersId($conn){
  $i=0;
  $names = [];
  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $names[$i] = $row["usersId"];
        $i++;

    }
  }
  return $names;
  mysqli_stmt_close($stmt);

}

#----VIEW USERS FIELDS FROM DB-----




#-----UPDATE-----
function emptyInputUpdate($firstname, $lastname, $email ,$usertype){
  if (empty($firstname) || empty($lastname) || empty($email)  || empty($usertype)) {
    return  True;
  }
  else{
    return  False;
  }

}


function updateUser($conn, $firstname, $lastname, $email, $usertype, $id){

  $sql = "UPDATE users SET usersFirstName = '$firstname' , usersLastName = '$lastname',usersEmail = '$email', usersType ='$usertype' WHERE usersId = '$id' ";
  $result = mysqli_query($conn, $sql);
  if($result){
    header("location:../admin_index.php");
  }
}

function updateAcceptedVerifiedId($con_e, $id){

  $sql = "UPDATE emails SET emailsVerified = 0 WHERE emailsId = $id ; ";
  $result = mysqli_query($con_e, $sql);

}
function updateRejectedVerifiedId($con_e, $id){

  $sql = "UPDATE emails SET emailsVerified = 1 WHERE emailsId = $id ; ";
  $result = mysqli_query($con_e, $sql);


}

function postdateReturn($con_e, $aitisi_id){
    $sql = "SELECT emailsPostDate FROM emails  WHERE emailsId = $aitisi_id ; ";
    $result = mysqli_query($con_e, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          return $row["emailsPostDate"];

      }

    }
    else{
      echo 'asdasd';
    }
}



#-----UPDATE-----


#-------APPLICATION FORM---------
function emptyForm($start_date, $end_date, $reason){
  if (empty($start_date) || empty($end_date) || empty($reason)) {

    return True;
  }
  else{
    return  False;
  }

}


function compareDates($start_date, $end_date){
  if ($end_date > $start_date) {
    return True;
  }
  else{
    return False;
  }

}


function createApplication($con_e, $start_date,$end_date,$reason,$id){

  $sql = "INSERT INTO emails(emailsDateFrom,emailsDateTo,emailsReason,usersId,emailsPostDate,emailsVerified) VALUES(?,?,?,?,CURDATE(),2);";
  $stmt = mysqli_stmt_init($con_e);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../employee_index.php?logged=$id");
    exit();
  }

  mysqli_stmt_bind_param($stmt,"sssd",$start_date,$end_date,$reason,$id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

}



function viewEmailsId($con_e){
  $i=0;
  $dates = [];
  $sql = "SELECT * FROM emails;";
  $result = mysqli_query($con_e, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[$i] = $row["emailsId"];
        $i++;

    }
  }
  return $dates;
  mysqli_stmt_close($stmt);

}



function viewEmailsStartDate($con_e, $id){
  $i=0;
  $dates = [];
  $sql = "SELECT emailsDateFrom FROM emails ORDER BY emailsId DESC;";
  $result = mysqli_query($con_e, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[$i] = $row["emailsDateFrom"];
        $i++;

    }
  }
  return $dates;
  mysqli_stmt_close($stmt);

}


function viewEmailsEndDate($con_e){
  $i=0;
  $dates = [];
  $sql = "SELECT emailsDateTo FROM emails ORDER BY emailsId DESC;";
  $result = mysqli_query($con_e, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[$i] = $row["emailsDateTo"];
        $i++;

    }
  }
  return $dates;
  mysqli_stmt_close($stmt);

}
function viewUsersIdinEmails($con_e){
  $i=0;
  $dates = [];
  $sql = "SELECT * FROM emails;";
  $result = mysqli_query($con_e, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[$i] = $row["usersId"];
        $i++;

    }
  }
  return $dates;
  mysqli_stmt_close($stmt);


}
function viewemailsVerified($con_e){
  $i=0;
  $dates = [];
  $sql = "SELECT emailsVerified FROM emails ORDER BY emailsId DESC;";
  $result = mysqli_query($con_e, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dates[$i] = $row["emailsVerified"];
        $i++;

    }
  }
  return $dates;
  mysqli_stmt_close($stmt);


}





function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format($differenceFormat);

}
