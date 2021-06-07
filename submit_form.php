<?php
  include 'headers/employee_header.php';
 ?>


<div id="submitform">
  <br><br>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12 border .bg-primary">
                    <form id="login-form" class="form" action="includes/form.inc.php" method="post">
                        <h3 class="text-center text-info">Submission Form</h3>
                        <div class="form-group">
                          <?php
                          $id = $_GET["logged"];
                          echo "<input type='hidden' id='custId' name='custId' value='$id'>";


                           ?>
                            <label for="datefrom" class="text-info">Date From:</label><br>
                            <input type="date" name="datefrom" id="datefrom" class="form-control">


                        </div>
                        <div class="form-group">
                            <label for="dateto" class="text-info">Date To:</label><br>
                            <input type="date" name="dateto" id="dateto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="reason" class="text-info">Reason:</label><br>
                            <textarea type="text" name="reason" id="reason" class="form-control text-area" rows="3"></textarea>
                        </div>




                      <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
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
