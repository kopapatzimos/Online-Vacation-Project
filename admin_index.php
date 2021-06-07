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


  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<br><br>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body"  style="background-image: linear-gradient(to right, #FEEEEA, #9E9E9E
          );">
              <h2>Users</h2>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap user-table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">First Name</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Last Name</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">User Type</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Profile</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      for ($i=0; $i<count($firstnames); $i++){
                     ?>

                    <tr>
                      <?php
                      $j = $i + 1;
                      echo "<td class='pl-4'>$j</td>";

                       ?>
                       <td>

                        <?php

                          echo "<h5 class='font-medium mb-0 font-italic'>$firstnames[$i]</h5>";

                         ?>

                      </td>
                      <td>
                        <?php

                          echo "<h5 class='font-medium mb-0 font-italic'>$lastnames[$i]</h5>";

                        ?>
                        </td>
                        <td>
                      <?php
                        echo "<h5 class='font-medium mb-0 font-italic'>$emails[$i]</h5>";


                        ?>

                      </td>
                      <td>
                        <?php

                          echo "<h5 class='font-medium mb-0 font-italic'>$userstype[$i]</h5>";

                         ?>

                      </td>
                      <td>
                        <?php
                          echo "<a href= 'view_profile.php?id=$usersId[$i]' type='submit' name='email' class='btn btn-info btn-md'>View Profile</a>" ;
                        }

                        ?>

                      </td>


                    </tr>


                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
