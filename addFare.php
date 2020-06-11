<?php
include 'database/init.php';
protect_page();
include('includes/header.php');
include('includes/navbar.php');
?>


<?php

require("connection.php");
$Query = "SELECT rId,rTo,rFrom FROM `route`";
$query_run = mysqli_query($con, $Query);
?>


<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <<div class="col-lg-2 d-flex"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Add new Fare!</h1>
            </div>
            <form class="user" id="form" action="Manage_Fare/addFareQuery.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="fareid" placeholder="Fare ID">
              </div>
              <div class="form-group ">
                <div class="col-sm-13 mb-3 mb-sm-0">
                  <select name="route" class="form-control form-dropdown " >

                    <?php
                    if (mysqli_num_rows($query_run) > 0) {
                      while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                        <option value="<?php echo $row['rId'];?>"><?php echo $row['rTo']; echo " - "; echo $row['rFrom']; ?></option>
                    <?php

                      }
                    } else {
                      echo 'No record found';
                    }
                    ?>
                  </select>
                </div>
                
              </div>
              
                <div class="form-group">
                <input type="text" class="form-control form-control-user" name="price" placeholder="Price">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="class" placeholder="Class">
              </div>
          </div>
          
          <a href="#" class="btn btn-primary btn-user btn-block" onclick="document.getElementById('form').submit();">
            Add New Fare
          </a>
          <br><br>
        </div>
      </div>
    </div>
  </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>