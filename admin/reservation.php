  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reservation | Ahavah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet"href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
  <link rel="stylesheet" href="../css/custom.css">

  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon_io/favicon-16x16.png">

  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="../site.js"></script>
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <button class="navbar-toggle">&#9776;</button>
      <ul class="navbar-list">
        <li class="navbar-item"><a href="reservation.php" class="navbar-link">Reservations</a></li>
        <li class="navbar-item">
          <a href="#" class="navbar-link" data-popover="#recordNavPopover">Records</a>
          <div id="recordNavPopover" class="popover">
            <ul class="popover-list">
              <li class="popover-item"><a href="record_client.php" class="popover-link">Client</a></li>
              <li class="popover-item"><a href="record_haird.php" class="popover-link">Hairdresser</a></li>
            </ul>
          </div>
        </li>
        <li class="navbar-item">
          <a href="#" class="navbar-link" data-popover="#serviceNavPopover">Services</a>
          <div id="serviceNavPopover" class="popover">
            <ul class="popover-list">
              <li class="popover-item"><a href="service_all.php" class="popover-link">All</a></li>
              <li class="popover-item"><a href="service_indiv.php" class="popover-link">Individual</a></li>
              <li class="popover-item"><a href="service_bundled.php" class="popover-link">Bundled</a></li>
            </ul>
          </div>
        </li>
        <li class="navbar-item"><a href="inventory.php" class="navbar-link">Inventory</a></li>
        <li class="navbar-item"><a href="payment.php" class="navbar-link">Payment</a></li>
        <li class="navbar-item"><a href="../function/logout.php?logout=true&redirect=../landing.php" class="navbar-link">Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="section">
    <div class="container"> 
      <div class="row head" >
        <div class="one-half column">
          <h2>Reservation</h2>
        </div>
        <div class="one-half column add">
          <a class="button button-primary" href="add_res_form.php">Add</a>
        </div>
      </div>
      <div class="row table" style="overflow-x: scroll;">
        <table class="twelve columns">
          <thead>
            <tr>
              <td>RES_ID</td>
              <td>RES_DATE</td>
              <td>HAIRD_ID</td>
              <td>CLIENT_ID</td>
              <td>SERVICE_ID</td>
              <td>PAY_ID</td>
              <td>APPT_DATE</td>
              <td>EDIT</td>
              <td>DELETE</td>
            </tr>
          </thead>
          <tbody>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "Ahavah_DB";
              $port = "3308";

              $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }

              $sql = "SELECT * FROM Reservations";
              if ($result = $conn -> query($sql)) {
                while ($row = $result -> fetch_assoc()) {
                  $RES_ID = $row['RES_ID'];
                  $RES_DATE = $row['RES_DATE'];
                  $HAIRD_ID = $row['HAIRD_ID'];
                  $CLIENT_ID = $row['CLIENT_ID'];
                  $SERVICE_ID = $row['SERVICE_ID'];
                  $PAY_ID = $row['PAY_ID'];
                  $APPT_DATE = $row['APPT_DATE'];

                  echo "<tr>";
                  echo "<td>$RES_ID</td>";
                  echo "<td>$RES_DATE</td>";
                  echo "<td>$HAIRD_ID</td>";
                  echo "<td>$CLIENT_ID</td>";
                  echo "<td>$SERVICE_ID</td>";
                  echo "<td>$PAY_ID</td>";
                  echo "<td>$APPT_DATE</td>";
                  echo "<td><a href='./edit_res_form.php?GIVEN_RES_ID=$RES_ID' class='button'>Edit</a></td>";
                  echo "<td><a href='./function/del_res.php?GIVEN_RES_ID=$RES_ID' class='button button-primary'>Delete</a></td>";
                  echo "</tr>";
                }
              }  
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
