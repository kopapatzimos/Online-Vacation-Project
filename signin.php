<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Sign In</title>

  </head>

  <body>
    <?php
    include 'headers/header.php';
    ?>
      <div id="login">
          <br><br>
          <div class="container">
              <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                      <div id="login-box" class="col-md-12 border .bg-primary">
                          <form id="login-form" class="form" action="includes/signin.inc.php" method="post">
                              <h3 class="text-center text-info">Sign In</h3>
                              <div class="form-group">
                                  <label for="email" class="text-info">E-mail:</label><br>
                                  <input type="text" name="email" id="email" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="password" class="text-info">Password:</label><br>
                                  <input type="password" name="password" id="password" class="form-control">
                              </div>
                              <div class="form-group">
                                  <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign in">
                              </div>

                          </form>
                      </div>
                      <div class="text-center text-danger">
                        <?php
                          if (isset($_GET["error"])) {
                              if ($_GET["error"] =="emptyinput") {

                                echo "<p>All fields must be filled!</p>";
                              }
                              elseif ($_GET["error"] =="wronglogin") {
                                echo "<p>Your email or your password is wrong</p>";
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
