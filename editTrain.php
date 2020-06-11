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
        <div class="col-lg-2 d-flex"></div>
          <div class="col-lg-7">
          <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Train!</h1>
              </div>

              <?php
                        include "connection.php";

                        if (isset($_POST['edit_btn'])) {
                            $id = $_POST['edit_id'];

                            $Query = "SELECT * FROM `train` WHERE trainId='$id'";
                            $query_run = mysqli_query($con, $Query);

                            foreach ($query_run as $row) {
                ?>

              <form id="form" class="user" action="Manage_Train/updateTrainQuery.php" method="POST">
                <div class="form-group">
                  <input type="hidden" value="<?php echo $row['trainId'] ?>" class="form-control form-control-user" name="trainId">
                </div>
                <div class="form-group">
                  <input type="text" value="<?php echo $row['trainName'] ?>" class="form-control form-control-user" name="trainName">
                </div>
                <a href="#" class="btn btn-primary btn-user btn-block" name="addTrain" onclick="document.getElementById('form').submit();"> Update Train </a>
                <!-- <button type="submit" name="addTrain" class="btn btn-danger"> Add Train</button> -->
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
                            }
                        }
?>


  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>