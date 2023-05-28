<?php /*
  require_once('./backend/config.php');

  if (isset($_GET["CLIENT_ID"])) {
    $CLIENT_ID = $_GET["CLIENT_ID"];
    $sql = "SELECT * FROM Clients WHERE CLIENT_ID = ".$CLIENT_ID;

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $CLIENT_ID = $row['CLIENT_ID'];
      $CLIENT_FNAME = $row['CLIENT_FNAME'];   
      $CLIENT_LNAME = $row['CLIENT_LNAME'];
      $CLIENT_PNAME = $row['CLIENT_PNAME'];
      $CLIENT_PHONE = $row['CLIENT_PHONE'];
      $CLIENT_MSNGR = $row['CLIENT_MSNGER'];

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
      <h2>Edit Client (<?php echo $CLIENT_ID; ?>)</h2>
    </div>
    <div class="row">
      <div>
        <?php if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_client.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="CLIENT_FNAME">CLIENT_FNAME</label>
            <input type="text" name="CLIENT_FNAME" id="CLIENT_FNAME" required>
          <label for="CLIENT_LNAME">CLIENT_LNAME</label>
            <input type="text" name="CLIENT_LNAME" id="CLIENT_LNAME" required>
          <label for="CLIENT_PNAME">CLIENT_PNAME</label>
            <input type="text" name="CLIENT_PNAME" id="CLIENT_PNAME" required>
          <label for="CLIENT_PHONE">CLIENT_PHONE</label>
            <input type="text" name="CLIENT_PHONE" id="CLIENT_PHONE" required>
          <label for="CLIENT_MSNGR">CLIENT_MSNGR</label>
            <input type="text" name="CLIENT_MSNGR" id="CLIENT_MSNGR" required>
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>