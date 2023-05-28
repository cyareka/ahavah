<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ahavah Reservation System</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="./backend/site.js"></script>

</head>
<body>
  <nav class="navbar">
    <div class="container">
      <ul class="navbar-list">
        <li class="navbar-item"><a href="http://" class="navbar-link">Reservations</a></li>

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
  <div class="section reservation">
    <div class="container"> 
        <div class="row">
          <div class="one-half column" style="margin-top: 10%">
            <h2>Reservations</h2>
          </div>
          <div class="one-half column">
            <div class="">
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="section "></div>
</body>
</html>
