<?php
include 'database/init.php';
protect_page();
include('includes/header.php'); 
include('includes/navbar.php'); 
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
                <h1 class="h4 text-gray-900 mb-4">Add a Train!</h1>
              </div>

              <form id="form" class="user" action="Manage_Train/addTrainQuery.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="trainId" placeholder="Train Id">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="trainName" placeholder="Train Name">
                </div>
                <a href="#" class="btn btn-primary btn-user btn-block" name="addTrain" onclick="document.getElementById('form').submit();"> Add New Train </a>
                <!-- <button type="submit" name="addTrain" class="btn btn-danger"> Add Train</button> -->
              </form>


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