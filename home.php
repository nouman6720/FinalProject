<!DOCTYPE html>
<html lang="en">
<?php
include 'core/init.php';
include 'connection.php';

//protect_page();

//protect page using cookies

// cookies


if(!isset($_COOKIE["type"]))
{
header("location: userlogin.php");

}

?>

<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Railway Managment System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style>
    body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
      overflow-x: hidden;
    }

    h3,
    h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;
      font-size: 20px;
      color: #111;
    }

    .container {
      padding: 80px 120px;
    }

    .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
    }

    .person:hover {
      border-color: #f1f1f1;
    }

    .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%);
      /* make all photos black and white */
      width: 100%;
      /* Set width to 100% */
      margin: auto;
    }

    .carousel-caption h3 {
      color: #fff !important;
    }

    @media (max-width: 600px) {
      .carousel-caption {
        display: none;
        /* Hide the carousel text when the screen is less than 600 pixels wide */
      }
    }

    .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
    }

    .bg-1 h3 {
      color: #fff;
    }

    .bg-1 p {
      font-style: italic;
    }

    .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
    }

    .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
    }

    .thumbnail p {
      margin-top: 15px;
      color: #555;
    }

    .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
    }

    .btn:hover,
    .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
    }

    .modal-header,
    h4,
    .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
    }

    .modal-header,
    .modal-body {
      padding: 40px 50px;
    }

    .nav-tabs li a {
      color: #777;
    }

    #googleMap {
      width: 100%;
      height: 400px;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }

    .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
    }

    .navbar li a,
    .navbar .navbar-brand {
      color: #d5d5d5 !important;
    }

    .navbar-nav li a:hover {
      color: #fff !important;
    }

    .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
    }

    .navbar-default .navbar-toggle {
      border-color: transparent;
    }

    .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
    }

    .dropdown-menu li a {
      color: #000 !important;
    }

    .dropdown-menu li a:hover {
      background-color: red !important;
    }

    footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
    }

    footer a {
      color: #f5f5f5;
    }

    footer a:hover {
      color: #777;
      text-decoration: none;
    }

    .form-control {
      border-radius: 0;
    }

    textarea {
      resize: none;
    }
  </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#myPage">RMS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#myPage">HOME</a></li>
          <li><a href="#ann">Public Announcements</a></li>
          <li><a href="#timetable">Time Table</a></li>
          <li><a href="#bookticket">Book Ticket</a></li>
          <li><a href="#station">Stations</a></li>
          <li><a href="#comments">Comments</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="userlogout.php">Logout</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">




      <div class="item active">
        <img src="graphics/adminstations.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Upcoming Station</h3>

        </div>
      </div>

      <div class="item">
        <img src="graphics/OrangeTrain.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Orange Train</h3>

        </div>
      </div>

      <div class="item ">
        <img src="graphics/Station3.jpg" alt="Station" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Allama Iqbal Express</h3>

        </div>
      </div>



    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Container (Public Announcements Section) -->
  <div id="ann" class="container text-center">
    <h3>Railway Ticket Reservation!</h3>
    <p><em>Come travel with us.</em></p>
    <p>Pakistan Railways forms the life line of the country by catering to its needs for large scale movement of freight as well as passenger traffic. It not only contributes to its economic growth but also promotes national integration.

      Pakistan Railways endeavours to run the trains strictly in accordance to time table. The progressive freight train support organization operated by professional management and competent staff endeavours to provide reliable, competitive and economical service of recognized standards to its customers.

      Pakistan Railways provides an important mode of Transportation in the farthest corners of the country and brings them closer for Business, sightseeing, pilgrimage and education. It has been a great integrating force and forms the life line of the country by catering to its needs for large scale movement of people and freight.</p>
    <br>

    <h3>Public Announcements:</h3>
    <p><em>You should arrive 1 hour before the train departure time. So that you can confirm your tickets.Thankyou! </em></p>




  </div>

  <?php

  require("connection.php");

  try {

    // prepare sql and bind parameters

    $stmt = $conn->prepare("SELECT *
                                        FROM ((fare
                                            INNER JOIN route ON fare.rId = route.rId)
                                                  INNER JOIN train ON route.trainId = train.trainId);");
    $stmt->execute();



    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //echo "All the records";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $conn = null;
  ?>


  <!-- Container (TimeTable Section) -->
  <div id="timetable" class="bg-1">
    <div class="container">
      <h3 class="text-center">Time Table</h3>
      <p class="text-center">Come Travel With us.<br> </p>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Train Route </th>
            <th> Departure Time </th>
            <th> Arrival Time </th>
            <th> Train Name </th>
            <th> Ticket Price </th>
            <th> Class </th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($stmt->fetchAll() as $k => $row) {
          ?>


            <tr>
              <td><?php echo $row['rTo'];
                  echo ' - ';
                  echo $row['rFrom']; ?></td>
              <td><?php echo $row['dTime']; ?></td>
              <td><?php echo $row['aTime']; ?></td>
              <td><?php echo $row['trainName']; ?></td>
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


  <!-- Container (Book Ticket Section) -->

  <br><br>
  <div id="bookticket">
    <div class="container">
      <h3 class="text-center">BOOK TICKET</h3>
      <p class="text-center">Easiest way to buy tickets.<br> Remember to book your tickets!</p>


      <form class="user" id="form" action="manage_ticket/addticketquery.php" method="POST">

        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="firstname" placeholder="First Name">
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" name="lastname" placeholder="Last Name">
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" name="address" placeholder="Address">
        </div>

        <div class="form-group">
          <input type="text" class="form-control form-control-user" name="cnic" placeholder="CNIC">
        </div>

        <div class="form-group">
          <input type="text" class="form-control form-control-user" name="contactnumber" placeholder="Contact Number">
        </div>

        <?php
        require("connection.php");

        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // prepare sql and bind parameters
          $stmt = $conn->prepare("SELECT *
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

        <p>Select Route:</p>
        <div class="form-group ">
          <div class="col-sm-13 mb-3 mb-sm-0">
            <select name="fareid" class="form-control form-dropdown ">

              <?php
              foreach ($stmt->fetchAll() as $k => $row) {
              ?>
                <option value="<?php echo $row['fid']; ?>"><?php echo $row['rTo'];
                                                            echo " - ";
                                                            echo $row['rFrom']; ?></option>
              <?php

              }
              ?>

            </select>
          </div>

        </div>




        <a href="#" class="btn btn-primary btn-user btn-block" onclick="document.getElementById('form').submit();">
          Book Ticket!
        </a>
    </div>




  </div>
  </div>

  <!-- Container (Contact Section) -->
  <div id="station" class="container"></div>
  <div class="container-fluid text-center bg-1">
    <h4>ALL STATIONS</h4>
    <div class="row text-center">
      <div class="col-sm-12">
        <?php
        require("connection.php");
        $result = mysqli_query($db, "SELECT * FROM station");
        while ($row = mysqli_fetch_array($result)) {
          echo "<div   class='row text-center'  class='row d-none d-md-flex' >";
          echo "<div id='img_div'  ' class='w-50 p-3   class='thumbnail'   >";
          echo "<img width='1050' class='w-50 p-3' height='600' src='graphics/" . $row['images'] . "' >";
          echo "<p>" . $row['sName'] . "</p>";
          echo "</div>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>
  </div>





  </div>

  <!-- Container (TimeTable Section) -->
  <br><br>
  <div id="comments">
    <h3 class="text-center">Comment Section</h3>




    <div class="container">
      <p class="text-center">Previous comments are shown here :<br></p>
      <div class="comment_listing"></div>
      <br><br>

      <h3 class="text-center">Give your Comments here : </h3>
      <p class="text-center">How was your experiance?<br> Let us know.By commenting down below!</p>
      <div class="form-group">
        <br>
        <input type="text" class="cname form-control form-control-user" placeholder="Name">
        <br>
        <textarea class="ccomment form-control form-control-user" placeholder="Comment"></textarea>
        <br>
        <a href="javascript:void(0)" class="btn btn-primary submit">Submit comment!</a>


      </div>
    </div>

  </div>

  <script type="text/javascript">
    function listComments() {
      $.ajax({
        url: 'comment_list.php',
        success: function(res) {
          $('.comment_listing').html(res);
        }
      })
    }
    $(function() {


      listComments();
      setInterval(function() {
        listComments();
      }, 10000);
      $('.submit').click(function() {
        var name = $('.cname').val();
        var comment = $('.ccomment').val();
        $.ajax({
          url: 'save_comment.php',
          data: 'name=' + name + '&comment=' + comment,
          type: 'post',
          success: function() {
            alert("Your comment has been posted");
            listComments();
          }
        })
      })
    })
  </script>



  <!-- Image of location/map -->
  <br><br>
  <div id="map" class="text-center bg-1">

    <h3>Railway Map of Pakistan</h3>

    <div class="form-group">
      <img src="graphics/mpss.jpg" class="img-responsive" style="width:100%">
    </div>

  </div>


  <!-- Footer -->
  <footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>Bootstrap Theme Made By <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">www.w3schools.com</a></p>
  </footer>

  <script>
    $(document).ready(function() {
      // Initialize Tooltip
      $('[data-toggle="tooltip"]').tooltip();

      // Add smooth scrolling to all links in navbar + footer link
      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function() {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    })
  </script>

</body>

</html>