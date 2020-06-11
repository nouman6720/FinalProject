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
      <h6 class="m-0 font-weight-bold text-primary">All the avaiable Fares!
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">


        <?php
        require("connection.php");
        try {
          // prepare sql and bind parameters

          $stmt = $conn->prepare("SELECT fid, fare.rId, price, class, route.rId, rTo, rFrom
                                        FROM fare
                                            INNER JOIN route ON fare.rId = route.rId;");
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
              <th> Fare ID </th>
              <th> Route </th>
              <th> Price </th>
              <th> Class </th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($stmt->fetchAll() as $k => $row) {
            ?>


              <tr>
                <td><?php echo $row['fid']; ?></td>
                <td><?php echo $row['rTo']; echo ' - ';  echo $row['rFrom']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['class']; ?></td>
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