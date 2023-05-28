<?php /*
  require_once('./backend/config.php');

  if (isset($_GET["RES_ID"])) {
    $RES_ID = $_GET["RES_ID"];
    $sql = "SELECT * FROM Bundled_Service WHERE RES_ID = ".$RES_ID;

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $RES_ID = $row['RES_ID'];
      $RES_DATE = $row['RES_DATE'];
      $HAIRD_ID = $row['HAIRD_ID'];
      $CLIENT_ID = $row['CLIENT_ID'];
      $SERVICE_ID = $row['SERVICE_ID'];
      $PAY_ID = $row['PAY_ID'];
      $APPT_DATE = $row['APPT_DATE'];

      if (!$result) {
          echo "Error: " . $conn -> error;
      }
  } else {
    echo "No record found.";
  }
  } else {
    echo "Invalid ID.";
  }
*/ ?>
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
      <h2>Edit Reservation (<?php echo $RES_ID; ?>)</h2>
    </div>
    <div class="row">
      <div>
        <?php  if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./backend/edit_res.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="APPT_DATE">APPT_DATE</label>
            <input type="date" name="APPT_DATE" id="APPT_DATE" required>
          <label for="HAIRD_ID">HAIRD_ID</label>
            <select name="HAIRD_ID" id="HAIRD_ID" required>
              <option value=""></option>
            </select>
          <label for="CLIENT_ID">CLIENT_ID</label>
            <select name="CLIENT_ID" id="CLIENT_ID" required>
              <option value=""></option>
            </select>
          <label for="SERVICE_ID">SERVICE_ID</label>
            <select name="SERVICE_ID" id="SERVICE_ID" required>
              <option value=""></option>
            </select>
          <label for="PAY_ID">PAY_ID</label>
            <select name="PAY_ID" id="PAY_ID" required>
              <option value=""></option>
            </select>
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>