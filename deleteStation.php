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
      <h6 class="m-0 font-weight-bold text-primary">Delete Station!
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">


        <?php
       
       require("connection.php");
        try {
          
          // prepare sql and bind parameters
          $stmt = $conn->prepare("SELECT * FROM `station`");
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
              <th> Station ID </th>
              <th> Station Name </th>
              <th> Station City </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($stmt->fetchAll() as $k => $row) {
            ?>

              <tr>
                <td><?php echo $row['sId']; ?></td>
                <td><?php echo $row['sName']; ?></td>
                <td><?php echo $row['sCity']; ?></td>
                <td>
                  <form action="Manage_Station/deleteStationQuery.php" method="post">
                    <input type="hidden" name="deleteStation" value="<?php echo $row['sId']; ?>">
                    <button type="submit" name="delete_tbtn" class="btn btn-danger"> DELETE</button>
                  </form>
                </td>
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