<?php /*
  require_once('./backend/config.php');

  if (isset($_GET["MED_ID"])) {
    $MED_ID = $_GET["MED_ID"];
    $sql = "SELECT * FROM Inventory WHERE MED_ID = ".$MED_ID;

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $MED_ID = $row['MED_ID'];
      $MED_TYPE = $row['MED_TYPE'];
      $QUANTITY = $row['QUANTITY'];
      $SOURCE_LOCATION = $row['SOURCE_LOCATION'];
      $SUPPLIER_NAME = $row['SUPPLIER_NAME'];
      $SUPPLIER_PHONE = $row['SUPPLIER_PHONE'];
      $BATCH_NO = $row['BATCH_NO'];

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
  <title>Edit Medicine | Ahavah</title>
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
      <h2>Edit Medicine (<?php echo $MED_ID; ?>)</h2>
    </div>
    <div class="row">
      <div>
        <?php  if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_med.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="MED_TYPE">MED_TYPE</label>
            <input type="text" name="MED_TYPE" id="MED_TYPE" required>
          <label for="QUANTITY">QUANTITY</label>
            <input type="text" name="QUANTITY" id="QUANTITY" required>
          <label for="SOURCE_LOCATION">SOURCE_LOCATION</label>
            <input type="text" name="SOURCE_LOCATION" id="SOURCE_LOCATION" required>
          <label for="SUPPLIER_NAME">SUPPLIER_NAME</label>
            <input type="text" name="SUPPLIER_NAME" id="SUPPLIER_NAME" required>
          <label for="SUPPLIER_PHONE">SUPPLIER_PHONE</label>
            <input type="text" name="SUPPLIER_PHONE" id="SUPPLIER_PHONE" required>
          <label for="BATCH_NO">BATCH_NO</label>
            <input type="text" name="BATCH_NO" id="BATCH_NO" required>
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>