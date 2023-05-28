<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Hairdresser | Ahavah</title>
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
      <h2>Add Hairdresser</h2>
    </div>
    <div class="row">
      <div>
        <?php if (isset($errorMessage)) { ?>
        <p><?= $errorMessage; ?></p>
        <?php } ?>
        <form action="./function/add_haird.php" method="post" style="display: flex; flex-direction: column; justify-content: flex-start; margin: 20px 0 20px 0;" enctype="multipart/form-data">
          <label for="HAIRD_ID">HAIRD_ID</label>
            <input type="text" name="HAIRD_ID" id="HAIRD_ID" required>
          <label for="HAIRD_FNAME">HAIRD_FNAME</label>
            <input type="text" name="HAIRD_FNAME" id="HAIRD_FNAME" required>
          <label for="HAIRD_LNAME">HAIRD_LNAME</label>
            <input type="text" name="HAIRD_LNAME" id="HAIRD_LNAME" required>
          <label for="HAIRD_PHONE">HAIRD_PHONE</label>
            <input type="text" name="HAIRD_PHONE" id="HAIRD_PHONE" required>
          <label for="HAIRD_MSNGR">HAIRD_MSNGR</label>
            <input type="text" name="HAIRD_MSNGR" id="HAIRD_MSNGR" required>
          <button class="button button-primary" type="submit" name="add" id="add">Add</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>