<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Service | Ahavah</title>
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
      <h2>Edit Service
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

          if (isset($_GET["GIVEN_SERVICE_ID"])) {
            $GIVEN_SERVICE_ID = $_GET["GIVEN_SERVICE_ID"];

            $sql = "SELECT * FROM Services WHERE SERVICE_ID = '$GIVEN_SERVICE_ID' ";

            $result = $conn->query($sql);

            if (!$result) {echo "Error: " . $conn -> error;}

            $row = $result->fetch_assoc();
            $STORED_SERVICE_ID = $row['SERVICE_ID'];
            echo " $STORED_SERVICE_ID";
          } else {echo "No record found.";}
        ?>
      </h2>
    </div>
    <div class="row">
      <div>
        <?php  if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_service.php?GIVEN_SERVICE_ID='<?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "Ahavah_DB";
          $port = "3308";

          $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $GIVEN_SERVICE_IDID = $_GET["GIVEN_SERVICE_ID"];
          echo "$GIVEN_SERVICE_ID"; ?>'" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="PRICE">PRICE</label>
            <input type="text" name="PRICE" id="PRICE" 
                value="<?php 
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "Ahavah_DB";
                  $port = "3308";

                  $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

                  if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                  }

                  if (isset($_GET["GIVEN_SERVICE_ID"])) {
                    $GIVEN_SERVICE_ID = $_GET["GIVEN_SERVICE_ID"];

                    $sql = "SELECT * FROM Services WHERE SERVICE_ID = '$GIVEN_SERVICE_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_PRICE = $row['PRICE'];
                    echo "$STORED_PRICE";

                  } else {echo "No record found.";}  
                ?>"
              required>
          <label for="MED_ID">MED_ID</label>
            <select name="MED_ID" id="MED_ID" required>
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
                $sql = "SELECT * FROM Inventory";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $MED_ID = $row['MED_ID'];
                        echo "<option id='MED_ID' name='MED_ID' value='$MED_ID'> $MED_ID<br>";
                    }
                } else {
                    echo "No Medicines added.";
                }

                $result->close(); // Close the result set
                //Close the database connection
                $conn->close();
              ?>
              <option>none</option>
              </optgroup>
            </select>
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>