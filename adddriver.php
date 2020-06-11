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
              <h1 class="h4 text-gray-900 mb-4">Add a driver!</h1>
            </div>


            <form class="user" id="form" action="Manage_Driver/addDriverQuery.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="driverId" placeholder="Driver ID" required>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" name="driverFirstName" placeholder="First Name" required>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user" name="driverLastName" placeholder="Last Name" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="driverAddress" placeholder="Address" required>
              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" name="driverContact" placeholder="Contact Number" required>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user" name="driverExprience" placeholder="Exprience" required>
                </div>
              </div>
              <a href="#" class="btn btn-primary btn-user btn-block" onclick="document.getElementById('form').submit();">
                Add New Driver
              </a>
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