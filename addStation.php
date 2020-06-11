<?php
include 'database/init.php';
protect_page();
include('includes/header.php');
include('includes/navbar.php');
?>


<?php

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

  // Get image name
  $image = $_FILES['image']['name'];


  // Get text
  $station_id = $_POST['StationID'];

  $station_name = $_POST['StationName'];

  $station_city = $_POST['StationCity'];
  //$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  // image file directory

  $target = "graphics/" . basename($image);

  /*
	  $sql = "INSERT INTO images VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);
*/
  require("connection.php");

  try {


    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO `station` 
                                VALUES (:station_id, :station_name, :station_city, :image)");
    $stmt->bindParam(':station_id', $station_id);
    $stmt->bindParam(':station_name', $station_name);
    $stmt->bindParam(':station_city', $station_city);
    $stmt->bindParam(':image', $image);


    // insert a row

    $stmt->execute();

    //  echo "New records created successfully";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;



  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
  } else {
    $msg = "Failed to upload image";
  }
}

require("connection.php");


$result = mysqli_query($db, "SELECT * FROM station");
?>


<div class="container">
  <form method="POST" action="addStation.php" enctype="multipart/form-data">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <<div class="col-lg-2 d-flex">
        </div>
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Add a Station!</h1>
            </div>
            <form class="form-control user" id="form" action="addStation.php" method="POST">


              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="StationID" placeholder="Station Id">
              </div>

              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="StationName" placeholder="Station Name">
              </div>

              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="StationCity" placeholder="Station City">
              </div>



              <div>
                <input type="file" name="image" required>
              </div>

              <!-- For image  

                  <div class="form-group">
                    <input type="image" class="form-control form-control-user" id="StationPicture" placeholder="Station City">
                  </div>

                  -->
              <br>
              <button type="submit" class="btn btn-primary btn-user btn-block" name="upload">POST</button>




            </form>
          </div>
        </div>
      </div>
    </div>
</div>
</form>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>