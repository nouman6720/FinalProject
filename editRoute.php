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
                            <h1 class="h4 text-gray-900 mb-4">Edit Route!</h1>
                        </div>

                        <?php
                        include "connection.php";

                        if (isset($_POST['delete_tbtn'])) {
                            $id = $_POST['updateRoute'];

                            $mainQuery = "SELECT * FROM `route` WHERE rId='$id'";
                            $mainquery_run = mysqli_query($con, $mainQuery);

                            foreach ($mainquery_run as $row1) {
                        ?>

                                <form class="user" id="form" action="Manage_Route/updateRouteQuery.php" method="POST">
                                    <div class="form-group ">
                                        <input type="hidden" value="<?php echo $row1['rId'] ?>" class="form-control form-control-user" name="roteId">
                                    </div>

                                    <?php
                                    require("connection.php");
                                    $Query = "SELECT sName FROM `station`";
                                    $query_run = mysqli_query($con, $Query);
                                    ?>

                                    <pre class="tab">  To                                 From</pre>
                                    <div class="form-group row">

                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                            <select name="to" class="form-control form-dropdown">

                                                <?php
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                        <option value="<?php echo $row['sName']; ?>"><?php echo $row['sName']; ?></option>
                                                <?php

                                                    }
                                                } else {
                                                    echo 'No record found';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <?php
                                        require("connection.php");
                                        $Query1 = "SELECT sName FROM `station`";
                                        $query_run1 = mysqli_query($con, $Query1);
                                        ?>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select name="from" class="form-control  form-dropdown" id="input_5" name="q5_listOf">

                                                <?php
                                                if (mysqli_num_rows($query_run1) > 0) {
                                                    while ($row = mysqli_fetch_assoc($query_run1)) {
                                                ?>
                                                        <option value="<?php echo $row['sName']; ?>"><?php echo $row['sName']; ?></option>
                                                <?php

                                                    }
                                                } else {
                                                    echo 'No record found';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <pre class="tab">  Departure</pre>
                                            <input type="time" class="form-control form-control-user" name="dtime" placeholder="">
                                        </div>
                                        <div class="col-sm-6">
                                            <pre class="tab">  Arrival</pre>
                                            <input type="time" class="form-control form-control-user" name="atime" placeholder="">
                                        </div>
                                    </div>


                                    <?php
                                    require("connection.php");
                                    $Query2 = "SELECT * FROM `train`";
                                    $query_run2 = mysqli_query($con, $Query2);
                                    ?>
                                    <pre class="tab">  Select Train:</pre>
                                    <div class="form-group">
                                        <select name="trainid" class="form-control form-dropdown" id="input_5" name="q5_listOf">

                                            <?php
                                            if (mysqli_num_rows($query_run2) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run2)) {
                                            ?>
                                                    <option value="<?php echo $row['trainId']; ?>"><?php echo $row['trainName']; ?></option>
                                            <?php

                                                }
                                            } else {
                                                echo 'No record found';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                    require("connection.php");
                                    $Query3 = "SELECT * FROM `driver`";
                                    $query_run3 = mysqli_query($con, $Query3);
                                    ?>
                                    <pre class="tab">  Select Driver:</pre>
                                    <div class="form-group">
                                        <select name="driverid" class="form-control form-dropdown" id="input_5" name="q5_listOf">

                                            <?php
                                            if (mysqli_num_rows($query_run3) > 0) {
                                                while ($row = mysqli_fetch_assoc($query_run3)) {
                                            ?>
                                                    <option value="<?php echo $row['dId']; ?>"><?php echo $row['dFirstName'];
                                                                                                echo '  ';
                                                                                                echo $row['dLastName']; ?></option>
                                            <?php

                                                }
                                            } else {
                                                echo 'No record found';
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <a href="#" class="btn btn-primary btn-user btn-block" onclick="document.getElementById('form').submit();">
                                        Update Route
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