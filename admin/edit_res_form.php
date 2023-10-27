<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Reservation | Ahavah</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet"href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
  <link rel="stylesheet" href="../css/custom.css">

  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon_io/favicon-16x16.png">

  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="./backend/site.js"></script>
</head>
<body>
  <div class="container">
    <div class="row head">
      <h2>Edit Reservation
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

          if (isset($_GET["GIVEN_MED_ID"])) {
            $GIVEN_MED_ID = $_GET["GIVEN_MED_ID"];

            $sql = "SELECT * FROM Reservations WHERE RES_ID = '$GIVEN_RES_ID' ";

            $result = $conn->query($sql);

            if (!$result) {echo "Error: " . $conn -> error;}

            $row = $result->fetch_assoc();
            $STORED_RES_ID = $row['RES_ID'];
            echo " $STORED_RES_ID";
          } else {echo "No record found.";}
        ?>
      </h2>
    </div>
    <div class="row">
      <div>
        <?php  if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="function/edit_res.php?GIVEN_RES_ID='<?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "Ahavah_DB";
          $port = "3308";

          $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $GIVEN_RES_ID = $_GET["GIVEN_RES_ID"];
          echo "$GIVEN_RES_ID"; ?>'" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="APPT_DATE">APPT_DATE</label>
            <input type="date" name="APPT_DATE" id="APPT_DATE" required>

          <label for="HAIRD_ID">HAIRD_ID</label>
            <select name="HAIRD_ID" id="HAIRD_ID" required>
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

                // Display uploaded files
                $sql = "SELECT * FROM Hairdressers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $HAIRD_ID = $row['HAIRD_ID'];
                        
                        echo "<option>$HAIRD_ID</option>";
                    }
                } else {
                    echo "No hairdressers added.";
                }

                $result->close(); // Close the result set
                //Close the database connection
                $conn->close();
              ?>
            </select>
          <label for="CLIENT_ID">CLIENT_ID</label>
            <select name="CLIENT_ID" id="CLIENT_ID" required>
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

                // Display uploaded files
                $sql = "SELECT * FROM Clients";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $CLIENT_ID = $row['CLIENT_ID'];
                        
                        echo "<option>$CLIENT_ID</option>";
                    }
                } else {
                    echo "No Clients added.";
                }

                $result->close(); // Close the result set
                //Close the database connection
                $conn->close();
              ?>
            </select>
          <label for="SERVICE_ID">SERVICE_ID</label>
              <div id="service_list">
                <span><b>Individual Services</b></span><br>
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

                $sql = "SELECT * FROM Indiv_Services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $SERVICE_ID = $row['SERVICE_ID'];
                        echo "<input type='checkbox' id='SERVICE_ID' name='SERVICE_ID' value='$SERVICE_ID'> $SERVICE_ID<br>";
                    }
                } else {
                    echo "No Services added.";
                }

                $result->close(); // Close the result set
                //Close the database connection
                $conn->close();
                ?>
                <br>
                <span><b>Bundled Services</b></span><br>
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

                $sql = "SELECT * FROM Bundled_Services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $SERVICE_ID = $row['SERVICE_ID'];
                        echo "<input type='checkbox' id='SERVICE_ID' name='SERVICE_ID' value='$SERVICE_ID'> $SERVICE_ID<br>";
                    }
                } else {
                    echo "No Services added.";
                }

                $result->close(); // Close the result set
                //Close the database connection
                $conn->close();
              ?>
              <br>
            </div>

          <label for="PAY_ID">PAY_ID</label>
          <select name="PAY_ID">
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

              // Display uploaded files
              $sql = "SELECT * FROM Payments";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $PAY_ID = $row['PAY_ID'];
                      
                      echo "<option>$PAY_ID</option>";
                  }
              } else {
                  echo "No Payments added.";
              }

              $result->close(); // Close the result set
              //Close the database connection
              $conn->close();
            ?>
          </select>
          
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>