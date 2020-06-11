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
                            <h1 class="h4 text-gray-900 mb-4">Update Admin!</h1>
                        </div>

                        <?php
                        include "connection.php";

                        if (isset($_POST['edit_btn'])) {
                            $id = $_POST['edit_id'];

                            $Query = "SELECT * FROM `registration` WHERE id='$id'";
                            $query_run = mysqli_query($con, $Query);

                            foreach ($query_run as $row) {
                        ?>
                                <form id="form" class="user" action="Manage_Admin/updateAdminQuery.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" class="form-control form-control-user" name="updateId" required>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label> Username </label>
                                            <input type="text" value="<?php echo $row['username'] ?>" class="form-control form-control-user" name="updateUsername" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label> Email </label>

                                            <input type="email" value="<?php echo $row['email'] ?>" class="form-control form-control-user" name="updateemail" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label> Password </label>

                                        <input type="password" value="<?php echo $row['password'] ?>" class="form-control form-control-user" name="updatepassword" required>
                                    </div>

                                    <a href="register.php" class="btn btn-primary btn-user btn-block">
                                        Cancel
                                    </a>
                                    <a href="#" class="btn btn-primary btn-user btn-block" name="update_btn" onclick="document.getElementById('form').submit();">
                                        Update </a>
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
?>