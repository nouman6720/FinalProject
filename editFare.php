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
                            <h1 class="h4 text-gray-900 mb-4">Edit Fare!</h1>
                        </div>

                        <?php
                        require("connection.php");
                        $Query = "SELECT rId,rTo,rFrom FROM `route`";
                        $query_run = mysqli_query($con, $Query);
                        ?>

                        <?php
                        include "connection.php";

                        if (isset($_POST['delete_tbtn'])) {
                            $id = $_POST['updateFare'];

                            $mainQuery = "SELECT * FROM `fare` WHERE fid='$id'";
                            $mainquery_run = mysqli_query($con, $mainQuery);

                            foreach ($mainquery_run as $row1) {
                        ?>

                                <form class="user" id="form" action="Manage_Fare/updateFareQuery.php" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $row1['fid'] ?>" class="form-control form-control-user" name="fareid">
                                    </div>
                                    <div class="form-group ">
                                        <div class="col-sm-13 mb-3 mb-sm-0">
                                            <select name="route" class="form-control form-dropdown ">

                                                <?php
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                        <option value="<?php echo $row['rId']; ?>"><?php echo $row['rTo'];
                                                                                                    echo " - ";
                                                                                                    echo $row['rFrom']; ?></option>
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
                                        <input type="text" value="<?php echo $row1['price'] ?>" class="form-control form-control-user" name="price">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" value="<?php echo $row1['class'] ?>" class="form-control form-control-user" name="class">
                                    </div>
                    </div>

                    <a href="#" class="btn btn-primary btn-user btn-block" onclick="document.getElementById('form').submit();">
                        Update Fare
                    </a>
                    <br><br>
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