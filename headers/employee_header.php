
<?php
    session_start();
    if(!isset($_SESSION['usersId'])){
    header("Location../signin.php");
  }
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  </head>
  <body style="background-image: linear-gradient(to right, #FEEEEA, #9E9E9E
);">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <?php
        include 'includes/dbh.inc.php';
        include 'includes/functions.inc.php';
        $lastname = viewUsersLastNames($conn);
        $usersId = viewUsersId($conn);
        $firstname = viewUsersFirstNames($conn);
        $id = $_GET["logged"];

        echo "<input type='hidden' id='custId' name='custId' value='$id'>";
        echo "<a class='navbar-brand' href='employee_index.php?logged=$id'>Online Vacation Booking</a>";
        /*for($i=0; $i<count($usersId); $i++){
          if ($id == $usersId[$i]) {
            echo " <h2 class='mr-10'> $firstname[$i]</h2>";

          }
        }*/
         ?>






      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <?php
              echo "<a href='submit_form.php?logged=$id' class='btn btn-info btn-md'>Create Application</a> ";
              echo "<a href='includes\logout.inc.php' class='btn btn-info btn-md mr-auto'>Log Out</a>"
             ?>
             </li>
          </ul>
      </div>

    </nav>

  </body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
