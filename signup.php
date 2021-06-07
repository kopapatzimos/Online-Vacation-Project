<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title></title>
  </head>
  <body>
    <?php
    include 'headers/admin_header.php';
    ?>
      <div id="login">
        <br><br>
          <div class="container">
              <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                      <div id="login-box" class="col-md-12 border .bg-primary">
                          <form id="login-form" class="form" action="includes/signup.inc.php" method="post">
                              <h3 class="text-center text-info">Create User</h3>
                              <div class="form-group">
                                  <label for="firstname" class="text-info">First Name:</label><br>
                                  <input type="text" name="firstname" id="firstname" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="lastname" class="text-info">Last Name:</label><br>
                                  <input type="text" name="lastname" id="lastname" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="Email" class="text-info">Email:</label><br>
                                  <input type="text" name="email" id="email" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label for="password" class="text-info">Password:</label><br>
                                  <input type="password" name="password" id="password" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="confpassword" class="text-info">Confirm Password:</label><br>
                                  <input type="password" name="confpassword" id="confpassword" class="form-control">
                              </div>
                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">User Type</label>
                              </div>
                              <select class="custom-select" id="inputGroupSelect01" name="usertype">
                                <option selected>Choose...</option>
                                <option value="Admin">Admin</option>
                                <option value="Employee">Employee</option>

                              </select>
                            </div>
                              <div class="form-group">
                                  <input type="submit" name="submit" class="btn btn-info btn-md" value="Create">


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
  </body>
</html>
