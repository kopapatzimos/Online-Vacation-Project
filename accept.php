<?php
include 'headers/header.php';
require_once 'includes\dbh.inc.php';
require_once 'includes\emaildb.inc.php';
require_once 'includes\functions.inc.php';
$usersId = viewUsersId($conn);
$usersemail = viewUsersEmails($conn);
$users = viewUsersIdinEmails($con_e);

  $aithseis_id = viewEmailsId($con_e);
  $verified = viewemailsVerified($con_e);
  if(isset($_GET['aitisi'])){
    $aitisi_id = $_GET['aitisi'];

    for($i=0; $i<count($aithseis_id); $i++){
      if($aitisi_id == $aithseis_id[$i]){
        $user = $users[$i];
        for($j=0; $j<count($usersId); $j++){
          if($users[$i]==$usersId[$j]){
            $mailTo = $usersemail[$j];
          }

        }
        updateAcceptedVerifiedId($con_e, $aitisi_id);

        $post_date = postdateReturn($con_e, $aitisi_id);

        $mailFrom ="supervisor@gmail.com";
        $body = "From: $mailFrom \n\n Dear employee, your supervisor has accepted your application submitted on $post_date.";
        mail( $mailTo , "Vacation Application ", $body);


      }
    }

    echo "<h2>An accept email has been sent.</h2>";
  }



 ?>
