<?php
include 'headers/header.php';
require_once 'includes\dbh.inc.php';
require_once 'includes\emaildb.inc.php';
require_once 'includes\functions.inc.php';
  $aithseis_id = viewEmailsId($con_e);
  $verified = viewemailsVerified($con_e);
  if(isset($_GET['aitisi'])){
    $aitisi_id = $_GET['aitisi'];

    for($i=0; $i<count($aithseis_id); $i++){
      if($aitisi_id == $aithseis_id[$i]){

        updateRejectedVerifiedId($con_e, $aitisi_id);
        updateRejectedVerifiedId($con_e, $aitisi_id);
        $post_date = postdateReturn($con_e, $aitisi_id);

        $mailFrom ="supervisor@gmail.com";
        $body = "From: $mailFrom \n\n Dear employee, your supervisor has rejected your application submitted on $post_date.";
        mail( "kopapatzimos@gmail.com" , "Vacation Application", $body);



      }
    }

    echo "<h2>A reject email has been sent.</h2>";

  }



 ?>
