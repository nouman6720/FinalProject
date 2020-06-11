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
      <h6 class="m-0 font-weight-bold text-primary">Update Driver!
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">


        <?php
        
        
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
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($stmt->fetchAll() as $k => $row) {
            ?>

              <tr>
                <td><?php echo $row['dId']; ?></td>
                <td><?php echo $row['dFirstName']; ?></td>
                <td><?php echo $row['dLastName']; ?></td>
                <td><?php echo $row['dAddress']; ?></td>
                <td><?php echo $row['dContact']; ?></td>
                <td><?php echo $row['dExp']; ?></td>

                <td>
                  <form action="editDriver.php" method="post">
                    <input type="hidden" name="updateDriver" value="<?php echo $row['dId']; ?>">
                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
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