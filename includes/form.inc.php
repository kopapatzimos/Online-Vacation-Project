<?php

if (isset($_POST["submit"])) {
  $start_date = $_POST["datefrom"];
  $end_date = $_POST["dateto"];
  $reason = $_POST["reason"];
  $post_date = $_POST["postdate"];
  $id = $_POST["custId"];
  $subject ="Vacation Application";



  require_once 'dbh.inc.php';
  require_once 'emaildb.inc.php';
  require_once 'functions.inc.php';
  $usersId = viewUsersId($conn);
  $lastname = viewUsersLastNames($conn);
  $firstname = viewUsersFirstNames($conn);
  $emails = viewUsersEmails($conn);

  $aithseis_id = viewEmailsId($con_e);

  for($i=0; $i<count($usersId); $i++){
    if ($id == $usersId[$i]) {
      $mailFromFirstName = $firstname[$i];
      $mailFromLastName = $lastname[$i];
      $mailFrom = $emails[$i];

    }
  }

if(emptyForm($start_date, $end_date, $reason)){
    header("location:../submit_form.php?logged=$id");
    exit();
  }
  if(!compareDates($start_date, $end_date)){
    header("location:../submit_form.php?logged=$id");
    exit();

  }








  createApplication($con_e, $start_date,$end_date,$reason,$id);

  $aithseis_id = viewEmailsId($con_e);
  $aitisi_id  = end($aithseis_id);
  $body = "from :$mailFrom \n\n Dear Supervisor, employee  $mailFromFirstName $mailFromLastName requested for some time off,starting on $start_date and ending on $end_date, stating the reason $reason. \n\n Click on the above links to approve or reject the application:";

  $body .= "\n\n Accept: http://localhost/project/accept.php?aitisi=$aitisi_id \n\n Reject:http://localhost/project/reject.php?aitisi=$aitisi_id ";



  mail( "supervisor@gmail.com" , "Vacation Application", $body);
  header("location:../employee_index.php?logged=$id");


  exit();

}
