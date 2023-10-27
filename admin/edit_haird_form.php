<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Hairdresser | Ahavah</title>
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
      <h2>Edit Hairdresser
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

          if (isset($_GET["GIVEN_HAIRD_ID"])) {
            $GIVEN_HAIRD_ID = $_GET["GIVEN_HAIRD_ID"];

            $sql = "SELECT * FROM Hairdressers WHERE HAIRD_ID = '$GIVEN_HAIRD_ID' ";

            $result = $conn->query($sql);

            if (!$result) {echo "Error: " . $conn -> error;}

            $row = $result->fetch_assoc();
            $STORED_HAIRD_ID = $row['HAIRD_ID'];
            echo " $STORED_HAIRD_ID";
          } else {echo "No record found.";}
        ?>
      </h2>
    </div>
    <div class="row">
      <div>
        <?php if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_haird.php?GIVEN_HAIRD_ID='<?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "Ahavah_DB";
          $port = "3308";

          $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $GIVEN_HAIRD_ID = $_GET["GIVEN_HAIRD_ID"];
          echo "$GIVEN_HAIRD_ID"; ?>'" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">

          <label for="HAIRD_FNAME">HAIRD_FNAME</label>
            <input type="text" name="HAIRD_FNAME" id="HAIRD_FNAME" 
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

                  if (isset($_GET["GIVEN_HAIRD_ID"])) {
                    $GIVEN_HAIRD_ID = $_GET["GIVEN_HAIRD_ID"];

                    $sql = "SELECT * FROM Hairdressers WHERE HAIRD_ID = '$GIVEN_HAIRD_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_HAIRD_FNAME = $row['HAIRD_FNAME'];
                    echo "$STORED_HAIRD_FNAME";

                  } else {echo "No record found.";}  
                ?>"
              required>

          <label for="HAIRD_LNAME">HAIRD_LNAME</label>
            <input type="text" name="HAIRD_LNAME" id="HAIRD_LNAME" 
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

                  if (isset($_GET["GIVEN_HAIRD_ID"])) {
                    $GIVEN_HAIRD_ID = $_GET["GIVEN_HAIRD_ID"];

                    $sql = "SELECT * FROM Hairdressers WHERE HAIRD_ID = '$GIVEN_HAIRD_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_HAIRD_LNAME = $row['HAIRD_LNAME'];
                    echo "$STORED_HAIRD_LNAME";

                  } else {echo "No record found.";}  
                ?>"
              required>

          <label for="HAIRD_PHONE">HAIRD_PHONE</label>
            <input type="text" name="HAIRD_PHONE" id="HAIRD_PHONE" 
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

                  if (isset($_GET["GIVEN_HAIRD_ID"])) {
                    $GIVEN_HAIRD_ID = $_GET["GIVEN_HAIRD_ID"];

                    $sql = "SELECT * FROM Hairdressers WHERE HAIRD_ID = '$GIVEN_HAIRD_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_HAIRD_PHONE = $row['HAIRD_PHONE'];
                    echo "$STORED_HAIRD_PHONE";

                  } else {echo "No record found.";}  
                ?>"
              required>

          <label for="HAIRD_MSNGR">HAIRD_MSNGR</label>
            <input type="text" name="HAIRD_MSNGR" id="HAIRD_MSNGR" 
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

                  if (isset($_GET["GIVEN_HAIRD_ID"])) {
                    $GIVEN_HAIRD_ID = $_GET["GIVEN_HAIRD_ID"];

                    $sql = "SELECT * FROM Hairdressers WHERE HAIRD_ID = '$GIVEN_HAIRD_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_HAIRD_MSNGR = $row['HAIRD_MSNGR'];
                    echo "$STORED_HAIRD_MSNGR";

                  } else {echo "No record found.";}  
                ?>"
              required>
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>