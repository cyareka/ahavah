<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Payment | Ahavah</title>
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
      <h2>Edit Payment 
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

          if (isset($_GET["GIVEN_PAY_ID"])) {
            $GIVEN_PAY_ID = $_GET["GIVEN_PAY_ID"];

            $sql = "SELECT * FROM Payments WHERE PAY_ID = '$GIVEN_PAY_ID' ";

            $result = $conn->query($sql);

            if (!$result) {echo "Error: " . $conn -> error;}

            $row = $result->fetch_assoc();
            $STORED_PAY_ID = $row['PAY_ID'];
            echo " $STORED_PAY_ID";
          } else {echo "No record found.";}
        ?>
      </h2>
    </div>
    <div class="row">
      <div>
        <?php if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_pay.php?GIVEN_PAY_ID='<?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "Ahavah_DB";
          $port = "3308";

          $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $GIVEN_PAY_ID = $_GET["GIVEN_PAY_ID"];
          echo "$GIVEN_PAY_ID"; ?>'" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="AMOUNT">AMOUNT</label>
            <input type="text" name="AMOUNT" id="AMOUNT" 
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

                    if (isset($_GET["GIVEN_PAY_ID"])) {
                      $GIVEN_PAY_ID = $_GET["GIVEN_PAY_ID"];

                      $sql = "SELECT * FROM Payments WHERE PAY_ID = '$GIVEN_PAY_ID' ";

                      $result = $conn->query($sql);

                      if (!$result) {echo "Error: " . $conn -> error;}

                      $row = $result->fetch_assoc();
                      $STORED_AMOUNT = $row['AMOUNT'];
                      echo "$STORED_AMOUNT";

                    } else {echo "No record found.";}  
                  ?>"
              required>
          <label for="PAY_TYPE">PAY_TYPE</label>
            <select name="PAY_TYPE" id="PAY_TYPE" required>
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

                  if (isset($_GET["GIVEN_PAY_ID"])) {
                    $GIVEN_PAY_ID = $_GET["GIVEN_PAY_ID"];

                    $sql = "SELECT * FROM Payments WHERE PAY_ID = '$GIVEN_PAY_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_PAY_TYPE = $row['PAY_TYPE'];
                    echo "<option name='PAY_TYPE'>$STORED_PAY_TYPE</option>";

                    if ($STORED_PAY_TYPE==='gcash') {
                      echo "<option name='PAY_TYPE' value='bank-transfer'>bank-transfer</option>";
                      echo "<option name='PAY_TYPE' value='cash'>cash</option>";
                    } else if ($STORED_PAY_TYPE==='bank-transfer') {
                      echo "<option name='PAY_TYPE' value='gcash'>gcash</option>";
                      echo "<option name='PAY_TYPE' value='cash'>cash</option>";
                    } else if ($STORED_PAY_TYPE==='cash') {
                      echo "<option name='PAY_TYPE' value='gcash'>gcash</option>";
                      echo "<option name='PAY_TYPE' value='bank-transfer'>bank-transfer</option>";
                    }

                  } else {echo "No record found.";}  
                ?>"
            </select>

          <label for="PAY_RECEIPT">PAY_RECEIPT</label>
            <input type="file" name="PAY_RECEIPT" id="PAY_RECEIPT" 
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

                  if (isset($_GET["GIVEN_PAY_ID"])) {
                    $GIVEN_PAY_ID = $_GET["GIVEN_PAY_ID"];

                    $sql = "SELECT * FROM Payments WHERE PAY_ID = '$GIVEN_PAY_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_PAY_RECEIPT = $row['PAY_RECEIPT'];
                    echo "$STORED_PAY_RECEIPT";

                  } else {echo "No record found.";}  
                ?>"
              required>
          <label for="PAY_STATUS">PAY_STATUS</label>
            <select name="PAY_STATUS" id="PAY_STATUS" required>
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

                  if (isset($_GET["GIVEN_PAY_ID"])) {
                    $GIVEN_PAY_ID = $_GET["GIVEN_PAY_ID"];

                    $sql = "SELECT * FROM Payments WHERE PAY_ID = '$GIVEN_PAY_ID' ";

                    $result = $conn->query($sql);

                    if (!$result) {echo "Error: " . $conn -> error;}

                    $row = $result->fetch_assoc();
                    $STORED_PAY_STATUS = $row['PAY_STATUS'];
                    echo "<option name='PAY_STATUS'>$STORED_PAY_STATUS</option>";

                    if ($STORED_PAY_STATUS==='pending') {
                      echo "<option name='PAY_STATUS'>paid</option>";
                    } else if ($STORED_PAY_STATUS==='paid') {
                      echo "<option name='PAY_STATUS'>pending</option>";
                    }

                  } else {echo "No record found.";}  
                ?>"
            </select>

            
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>