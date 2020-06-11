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
      >
      <div class="row">
      <div class="col-lg-2 d-flex"></div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edit Driver!</h1>
            </div>

            <?php
            include "connection.php";

            if (isset($_POST['edit_btn'])) {
              $id = $_POST['updateDriver'];

              $Query = "SELECT * FROM `driver` WHERE dId='$id'";
              $query_run = mysqli_query($con, $Query);

              foreach ($query_run as $row) {
            ?>

                <form class="user" id="form" action="Manage_Driver/updateDriverQuery.php" method="POST">
                  <div class="form-group">
                    <input type="hidden" value="<?php echo $row['dId'] ?>" class="form-control form-control-user" name="driverId">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" value="<?php echo $row['dFirstName'] ?>" class="form-control form-control-user" name="driverFirstName">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" value="<?php echo $row['dLastName'] ?>" class="form-control form-control-user" name="driverLastName">
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" value="<?php echo $row['dAddress'] ?>" class="form-control form-control-user" name="driverAddress" >
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" value="<?php echo $row['dContact'] ?>" class="form-control form-control-user" name="driverContact">
                    </div>
                    <div class="col-sm-6">
                      <input type="text" value="<?php echo $row['dExp'] ?>" class="form-control form-control-user" name="driverExprience">
                    </div>
                  </div>
                  <a href="#" class="btn btn-primary btn-user btn-block" onclick="document.getElementById('form').submit();">
                    Update Driver
                  </a>
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