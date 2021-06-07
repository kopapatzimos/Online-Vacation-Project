
<?php

    include 'headers/admin_header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';


    $usersId = viewUsersId($conn);
    $firstnames = viewUsersFirstNames($conn);
    $lastnames = viewUsersLastNames($conn);
    $emails= viewUsersEmails($conn);
    $userstype = viewUsersType($conn);
?>
<div id="login">
  <br><br>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12 border .bg-primary">
                    <form id="login-form" class="form" action="includes/update.inc.php" method="post">
                      <?php
                      $id = $_GET["id"];
                      echo "<input type='hidden' id='custId' name='custId' value='$id'>";
                      ?>



                        <h3 class="text-center text-info">Update User</h3>
                        <div class="form-group">
                            <label for="firstname" class="text-info">First Name:</label><br>
                            <input autocomplete='off' type="text" name="firstname" id="firstname" class="form-control"  value="<?php
                            for($i=0; $i<count($emails); $i++){
                                if($_GET["id"]==$usersId[$i]){
                                    echo $firstnames[$i];
                                    }
                              }?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="text-info">Last Name:</label><br>
                            <input autocomplete='off' type="text" name="lastname" value="<?php
                            for($i=0; $i<count($emails); $i++){
                                if($_GET["id"]==$usersId[$i]){
                                    echo $lastnames[$i];
                                  }
                                } ?>" id="lastname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" value="<?php
                            for($i=0; $i<count($emails); $i++){
                                if($_GET["id"]==$usersId[$i]){
                                    echo $emails[$i];
                                  }
                                } ?>">
                        </div>


                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">User Type</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="usertype">
                          <option selected><?php
                          for($i=0; $i<count($emails); $i++){
                              if($_GET["id"]==$usersId[$i]){
                                  echo $userstype[$i];
                                }
                              } ?></option>
                          <option value="Admin">Admin</option>
                          <option value="Employee">Employee</option>

                        </select>
                      </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Update">


                        </div>


                    </form>



                </div>
                <div class="text-center text-danger">
                  <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] =="emptyinput") {

                          echo "<p>All fields must be filled!</p>";
                        }
                        elseif ($_GET["error"] =="indvalidemail") {
                          echo "<p>Choose a proper E-mail</p>";
                        }
                        elseif ($_GET["error"] =="indvalidwrongpassword") {
                          echo "<p>You used wrong password </p>";
                        }
                        elseif ($_GET["error"] =="emailexists") {
                          echo "<p>This email already exists </p>";
                        }
                        elseif ($_GET["error"] =="notusertype") {
                          echo "<p>Choose a user type </p>";
                        }

                        elseif($_GET["error"] =="none"){

                            echo "<p>You Signed In</p>";
                        }
                      }

                   ?>


                </div>


            </div>

        </div>
    </div>
</div>
