<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Reservation | Ahavah</title>
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
      <h2>Add Reservation</h2>
    </div>
    <div class="row">
      <div>
        <?php  if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./backend/add_res.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="RES_ID">RES_ID</label>
            <input type="text" name="RES_ID" id="RES_ID" required>
          <label for="RES_DATE">RES_DATE</label>
            <input type="date" name="RES_DATE" id="RES_DATE" required>
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
          <label for="APPT_DATE">APPT_DATE</label>
            <input type="date" name="APPT_DATE" id="APPT_DATE" required>
          <button class="button button-primary" type="submit" name="add" id="add">Add</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>