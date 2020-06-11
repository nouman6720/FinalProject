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
      <h6 class="m-0 font-weight-bold text-primary">Update Route!
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">


        <?php
        
        require("connection.php");
        try {
          // prepare sql and bind parameters
          $stmt = $conn->prepare("SELECT *
                                        FROM ((route
                                              INNER JOIN train ON route.trainId = train.trainId)
                                              INNER JOIN driver ON route.dId = driver.dId);");
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
              <th> Route ID </th>
              <th> To </th>
              <th> From </th>
              <th> Departure Time </th>
              <th> Arrival Time </th>
              <th> Train Name </th>
              <th> Driver Name </th>
              <th> Edit </th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($stmt->fetchAll() as $k => $row) {
            ?>
              <tr>
                <td><?php echo $row['rId']; ?></td>
                <td><?php echo $row['rTo']; ?></td>
                <td><?php echo $row['rFrom']; ?></td>
                <td><?php echo $row['dTime']; ?></td>
                <td><?php echo $row['aTime']; ?></td>
                <td><?php echo $row['trainName']; ?></td>
                <td><?php echo $row['dFirstName']; echo '  '; echo $row['dLastName']; ?></td>
                <td>
                  <form action="editRoute.php" method="post">
                    <input type="hidden" name="updateRoute" value="<?php echo $row['rId']; ?>">
                    <button type="submit" name="delete_tbtn" class="btn btn-success"> Edit</button>
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