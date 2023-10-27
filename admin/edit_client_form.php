<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Client | Ahavah</title>
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
      <h2>Edit Client 
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

          if (isset($_GET["GIVEN_CLIENT_ID"])) {
            $GIVEN_CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];

            $sql = "SELECT * FROM Clients WHERE CLIENT_ID = '$GIVEN_CLIENT_ID' ";

            $result = $conn->query($sql);

            if (!$result) {echo "Error: " . $conn -> error;}

            $row = $result->fetch_assoc();
            $STORED_CLIENT_ID = $row['CLIENT_ID'];
            echo "$STORED_CLIENT_ID";
          } else {echo "No record found.";}
        ?>
      </h2>
    </div>
    <div class="row">
      <div>
        <?php if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_client.php?GIVEN_CLIENT_ID='<?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "Ahavah_DB";
          $port = "3308";

          $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $GIVEN_CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];
          echo "$GIVEN_CLIENT_ID"; ?>'" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          
          <label for="CLIENT_FNAME">CLIENT_FNAME</label>
            <input type="text" name="CLIENT_FNAME" id="CLIENT_FNAME" 
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

                  if (isset($_GET["GIVEN_CLIENT_ID"])) {
                    $GIVEN_CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];

                    $sql = "SELECT * FROM Clients WHERE CLIENT_ID = '$GIVEN_CLIENT_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_CLIENT_FNAME = $row['CLIENT_FNAME'];
                    echo "$STORED_CLIENT_FNAME";

                  } else {echo "No record found.";}  
                ?>" 
              required>

          <label for="CLIENT_LNAME">CLIENT_LNAME</label>
            <input type="text" name="CLIENT_LNAME" id="CLIENT_LNAME" 
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

                  if (isset($_GET["GIVEN_CLIENT_ID"])) {
                    $GIVEN_CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];

                    $sql = "SELECT * FROM Clients WHERE CLIENT_ID = '$GIVEN_CLIENT_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_CLIENT_LNAME = $row['CLIENT_LNAME'];
                    echo "$STORED_CLIENT_LNAME";

                  } else {echo "No record found.";}  
                ?>" 
              required>

          <label for="CLIENT_PNAME">CLIENT_PNAME</label>
            <input type="text" name="CLIENT_PNAME" id="CLIENT_PNAME" 
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

                  if (isset($_GET["GIVEN_CLIENT_ID"])) {
                    $GIVEN_CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];

                    $sql = "SELECT * FROM Clients WHERE CLIENT_ID = '$GIVEN_CLIENT_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_CLIENT_PNAME = $row['CLIENT_PNAME'];
                    echo "$STORED_CLIENT_PNAME";

                  } else {echo "No record found.";}  
                ?>" 
              required>

          <label for="CLIENT_PHONE">CLIENT_PHONE</label>
            <input type="text" name="CLIENT_PHONE" id="CLIENT_PHONE" 
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

                  if (isset($_GET["GIVEN_CLIENT_ID"])) {
                    $GIVEN_CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];

                    $sql = "SELECT * FROM Clients WHERE CLIENT_ID = '$GIVEN_CLIENT_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_CLIENT_PHONE = $row['CLIENT_PHONE'];
                    echo "$STORED_CLIENT_PHONE";

                  } else {echo "No record found.";}  
                ?>" 
              required>

          <label for="CLIENT_MSNGR">CLIENT_MSNGR</label>
            <input type="text" name="CLIENT_MSNGR" id="CLIENT_MSNGR" 
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

                  if (isset($_GET["GIVEN_CLIENT_ID"])) {
                    $GIVEN_CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];

                    $sql = "SELECT * FROM Clients WHERE CLIENT_ID = '$GIVEN_CLIENT_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_CLIENT_MSNGR = $row['CLIENT_MSNGR'];
                    echo "$STORED_CLIENT_MSNGR";

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