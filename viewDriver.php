<?php
include 'database/init.php';
protect_page();
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All the avaiable Drivers!
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">


        <?php
        /*
        $con = new mysqli('localhost', 'root', '', 'nomi');
        $Query = "SELECT * FROM `driver`";
        $query_run = mysqli_query($con, $Query);
        */

        require("connection.php");
        try {
          
          // prepare sql and bind parameters
          $stmt = $conn->prepare("SELECT * FROM `driver`");
          $stmt->execute();

          $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

          //echo "All the records";
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

        $conn = null;


        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> Driver ID </th>
              <th> Driver FirstName </th>
              <th> Driver LastName </th>
              <th> Driver Address </th>
              <th> Driver Contact Number </th>
              <th> Driver Experience </th>
            </tr>
          </thead>
          <tbody>

            <?php
            /*
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
              */
            foreach ($stmt->fetchAll() as $k => $row) {
            ?>

              <tr>
                <td><?php echo $row['dId']; ?></td>
                <td><?php echo $row['dFirstName']; ?></td>
                <td><?php echo $row['dLastName']; ?></td>
                <td><?php echo $row['dAddress']; ?></td>
                <td><?php echo $row['dContact']; ?></td>
                <td><?php echo $row['dExp']; ?></td>
              </tr>
            <?php
              /*
              }
            } 
            else {
              echo 'No record found';
              */
            }
            ?>




          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
?>