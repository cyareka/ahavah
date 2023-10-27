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
      <h2>Add Service</h2>
    </div>
    <div class="row">
      <div>
        <?php  if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/add_service.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="SERVICE_ID">SERVICE_ID</label>
            <select name='SERVICE_ID'>
              <optgroup label="Individual Services">
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
                $sql = "SELECT * FROM Indiv_Services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $SERVICE_ID = $row['SERVICE_ID'];
                        echo "<option id='SERVICE_ID' name='SERVICE_ID' value='$SERVICE_ID'> $SERVICE_ID<br>";
                    }
                } else {
                    echo "No Services added.";
                }

                $result->close(); // Close the result set
                //Close the database connection
                $conn->close();
              ?>
              </optgroup>

              <optgroup label="Bundled Services">
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
                $sql = "SELECT * FROM Bundled_Services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $SERVICE_ID = $row['SERVICE_ID'];
                        echo "<option id='SERVICE_ID' name='SERVICE_ID' value='$SERVICE_ID'> $SERVICE_ID<br>";
                    }
                } else {
                    echo "No Services added.";
                }

                $result->close(); // Close the result set
                //Close the database connection
                $conn->close();
              ?>
              </optgroup>
            </select>
          <label for="PRICE">PRICE</label>
            <input type="text" name="PRICE" id="PRICE" required>
          <label for="MED_ID">MED_ID</label>
            <select name="MED_ID" id="MED_ID">
              <option>none</option>
            </select>
          <button class="button button-primary" type="submit" name="add" id="add">Add</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>