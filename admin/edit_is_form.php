<?php /*
  require_once('./backend/config.php');

  if (isset($_GET["SERVICE_ID"])) {
    $SERVICE_ID = $_GET["SERVICE_ID"];
    $sql = "SELECT * FROM Indiv_Service WHERE SERVICE_ID = ".$SERVICE_ID;

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $SERVICE_ID = $row['SERVICE_ID'];
      $IS_NAME = $row['IS_NAME'];   
      $IS_DESC = $row['IS_DESC'];

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
  <title>Edit Individual Service | Ahavah</title>
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
      <h2>Edit Individual Service (<?php echo $SERVICE_ID; ?>)</h2>
    </div>
    <div class="row">
      <div>
        <?php  if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/edit_is.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="IS_NAME">IS_NAME</label>
            <input type="text" name="IS_NAME" id="IS_NAME" required>
          <label for="IS_DESC">IS_DESC</label>
            <input type="text" name="IS_DESC" id="IS_DESC" required>
          <button class="button button-primary" type="submit" name="edit" id="edit">Edit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>