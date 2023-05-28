<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ahavah Reservation System</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="./backend/site.js"></script>
</head>
<style>

</style>
<body>
  <nav class="navbar">
    <div class="container">
      <ul class="navbar-list">
        <li class="navbar-item"><a href="../landing.php" class="navbar-link">Home</a></li>
        <li class="navbar-item"><a href="reservation.php" class="navbar-link">Reservations</a></li>
        <li class="navbar-item">
          <a href="#" class="navbar-link" data-popover="codeNavPopover">Records</a>
          <div id="codeNavPopover" class="popover">
            <ul class="popover-list">
              <li class="popover-item"><a href="client.php" class="popover-link">Client</a></li>
              <li class="popover-item"><a href="hairdresser.php" class="popover-link">Hairdresser</a></li>
            </ul>
          </div>
        </li>

        <li class="navbar-item"><a href="inventory.php" class="navbar-link">Inventory</a></li>
      </ul>
    </div>
  </nav>
  <div class="section inventory">
    <div class="container">
      <div class="row">
        <div class="one-half column" style="margin-top: 10%;">
          <h2>Inventory</h2>
        </div>
      </div>
      <div class="row">
        <table class="twelve columns">
          <thead>
            <tr>
              <td>MEDICINE ID</td>
              <td>MEDICINE TYPE</td>
              <td>QUANTITY</td>
              <td>SOURCE LOCATION</td>
              <td>SUPPLIER NAME</td>
              <td>SUPPLIER PHONE</td>
              <td>BATCH NO.</td>
            </tr>
          </thead>
          <tbody>
            <?php
              require_once './backend/config.php';
              $sql = "SELECT * FROM Inventory";
              if ($result = $conn -> query($sql)) {
                while ($row = $result -> fetch_assoc()) {
                  $MED_ID = $row['MED_ID'];
                  $MED_TYPE = $row['MED_TYPE'];
                  $QUANTITY = $row['QUANTITY'];
                  $SOURCE_LOCATION = $row['SOURCE_LOCATION'];
                  $SUPPLIER_NAME = $row['SUPPLIER_NAME'];
                  $SUPPLIER_PHONE = $row['SUPPLIER_PHONE'];
                  $BATCH_NO = $row['BATCH_NO'];
                }
              }
            ?>
            <td><?php echo $MED_ID; ?></td>
            <td><?php echo $MED_TYPE; ?></td>
            <td><?php echo $QUANTITY; ?></td>
            <td><?php echo $SOURCE_LOCATION; ?></td>
            <td><?php echo $SUPPLIER_NAME; ?></td>
            <td><?php echo $SUPPLIER_PHONE; ?></td>
            <td><?php echo $BATCH_NO; ?></td>
            <td><a href="./admin/edit_med_form.php?=<?php echo $MED_ID; ?>" class="button button-primary">Edit</a></td>
            <td><a href="./function/del_med.php?=<?php echo $MED_ID; ?>">Delete</a></td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>