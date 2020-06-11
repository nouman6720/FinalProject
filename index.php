<?php
include 'database/init.php';
protect_page();
include('includes/header.php');
include('includes/navbar.php');
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


                <?php

                require("connection.php");
                try {
                  // prepare sql and bind parameters
                  $stmt = $conn->prepare("SELECT COUNT(*) FROM `registration`");
                  $stmt->execute();

                  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                  $num_rows = $stmt->fetchColumn();
                  //echo "All the records";
                } catch (PDOException $e) {
                  echo "Error: " . $e->getMessage();
                }

                $conn = null;
                ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_rows; ?></div>


              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total soled Tickets</div>

              <?php


              require("connection.php");
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // prepare sql and bind parameters
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `ticket`");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $num_rows = $stmt->fetchColumn();
                //echo "All the records";
              } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
              }

              $conn = null;
              ?>

              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_rows; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Users</div>

              <?php

              require("connection.php");
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // prepare sql and bind parameters
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `user`");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $num_rows = $stmt->fetchColumn();
                //echo "All the records";
              } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
              }

              $conn = null;
              ?>
              <div class="row no-gutters align-items-center">

                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $num_rows; ?></div>

                <div class="col">

                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Routes</div>
              <?php

              require("connection.php");
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // prepare sql and bind parameters
                $stmt = $conn->prepare("SELECT COUNT(*) FROM `route`");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $num_rows = $stmt->fetchColumn();
                //echo "All the records";
              } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
              }

              $conn = null;
              ?>

              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $num_rows; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>