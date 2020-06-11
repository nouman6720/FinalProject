<?php
include 'database/init.php';
protect_page();
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4" >
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary" >Delete Train!
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">


      <?php
      require("connection.php");
                
                try {
                    // prepare sql and bind parameters
                    $stmt = $conn->prepare("SELECT * FROM `train`");
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
              <th> ID </th>
              <th> Name </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($stmt->fetchAll() as $k => $row) {
            ?>

                <tr>
                  <td><?php echo $row['trainId']; ?></td>
                  <td><?php echo $row['trainName']; ?></td>
                  <td>
                    <form action="Manage_train/deleteTrainQuery.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['trainId']; ?>">
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