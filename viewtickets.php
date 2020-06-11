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
      <h6 class="m-0 font-weight-bold text-primary">Information of Ticket Holder!
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
          $stmt = $conn->prepare("SELECT * FROM `ticket`");
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
              <th> FirstName </th>
              <th> LastName </th>
              <th> Address </th>
              <th> CNIC</th>
              <th> Contact Number </th>
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
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['cnic']; ?></td>
                <td><?php echo $row['contactnumber']; ?></td>
              </tr>
            <?php
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