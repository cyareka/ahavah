<?php /*
  require_once('./backend/config.php');

  if (isset($_GET["PAY_ID"])) {
    $PAY_ID = $_GET["PAY_ID"];
    $sql = "SELECT * FROM Payment WHERE PAY_ID = ".$PAY_ID;

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $PAY_ID = $row['PAY_ID'];
      $AMOUNT = $row['AMOUNT'];
      $PAY_TYPE = $row['PAY_TYPE'];
      $PAY_RECEIPT = $row['PAY_RECEIPT'];
      $PAY_STATUS = $row['PAY_STATUS'];

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
      <h2>Edit Payment (<?php echo $PAY_ID; ?>)</h2>
    </div>
    <div class="row">
      <div>
        <?php if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_pay.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="AMOUNT">AMOUNT</label>
            <input type="text" name="AMOUNT" id="AMOUNT" required>
          <label for="PAY_TYPE">PAY_TYPE</label>
            <input type="text" name="PAY_TYPE" id="PAY_TYPE" required>
          <label for="PAY_RECEIPT">PAY_RECEIPT</label>
            <input type="file" name="PAY_RECEIPT" id="PAY_RECEIPT" required>
          <label for="PAY_STATUS">PAY_STATUS</label>
            <select name="PAY_STATUS" id="PAY_STATUS" required>
              <option value="gcash">GCash</option>
              <option value="bank-transfer">Bank Transfer</option>
              <option value="cash">cash</option>
            </select>
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>