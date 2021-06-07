<?php

  require_once 'includes/emaildb.inc.php';

  include 'headers/employee_header.php';


  $email_ids = viewEmailsId($con_e);
  $start_date = viewEmailsStartDate($con_e, $id);
  $end_date = viewEmailsEndDate($con_e);
  $email_uid = viewUsersIdinEmails($con_e);
  $verified = viewemailsVerified($con_e);

  $j=0;







?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body"  style="background-image: linear-gradient(to right, #FEEEEA, #9E9E9E
          );">
              <h2>Past Applications</h2>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap user-table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Date From(start vacation)</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Date To (end vacation)</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Days requested</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Status</th>


                    </tr>
                  </thead>
                  <tbody>

                    <?php


                      for($i=0; $i<count($start_date); $i++){

                          if ($id == $email_uid[$i]) {

                     ?>

                    <tr>

                       <td>

                        <?php
                        $j++;
                        echo "<h5 class='font-medium mb-0'> $j </h5>";









                         ?>

                      </td>
                      <td>
                        <?php

                          echo "<h5 class='font-medium mb-0 font-italic'> $start_date[$i] </h5>";





                        ?>
                        </td>
                        <td>
                      <?php

                          echo "<h5 class='font-medium mb-0 font-italic'> $end_date[$i] </h5>";




                        ?>

                      </td>
                      <td>
                        <?php

                            $days = dateDifference( $end_date[$i],$start_date[$i] , $differenceFormat = '%a' );
                            echo "<h5 class='font-medium mb-0 font-italic'> $days </h5>";





                          ?>


                      </td>
                      <td>
                        <?php

                            if($verified[$i]==2){
                                echo "<h5 class='font-medium mb-0'> Pending... </h5>";
                            }
                            elseif ($verified[$i]==0) {
                                echo "<h5 class='font-medium mb-0 text-success'> Accepted! </h5>";
                            }
                            elseif ($verified[$i]==1) {
                                echo "<h5 class='font-medium mb-0 text-danger'> Rejected! </h5>";
                            }







                         ?>




                      </td>



                    </tr>
                    <?php
                      }
                    }

                     ?>

                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
