<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>Home | Ahavah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet"href="./css/normalize.css">
  <link rel="stylesheet" href="./css/skeleton.css">
  <link rel="stylesheet" href="./css/custom.css">

  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon_io/favicon-16x16.png">

  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="./backend/site.js"></script>
</head>
<style>
  @media (max-width: 749px) {
  .intro {
    text-align: center;
  }
  h1 {
    font-size: 5em;
    margin-top: 50%;
  }
  .navbar {
    border-top-width: 0; }
  .navbar,
  .navbar-spacer {
    display: block;
    width: 100%;
    height: 6.5rem;
    background: #fff;
    z-index: 99;
   }
  .navbar-spacer {
    display: none; }
  .navbar > .container {
    width: 100%; }
  .navbar-list {
    list-style: none;
    margin-bottom: 0; }
  .navbar-item {
    float: left;
    margin-bottom: 0; }
  .navbar-link {
    text-transform: uppercase;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: .2rem;
    margin-right: 35px;
    text-decoration: none;
    line-height: 6.5rem;
    color: #222; }
  .navbar-link:active { color: #ce4c0f; }
  .navbar-link:hover { color: #ce4c0f; }
  .navbar {
    position: fixed;
    top: 0;
    left: 0; }
  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
}
</style>
<body>
  <nav class="navbar">
  <div class="container">
    <ul class="navbar-list" id="navbar-list">
      <li class="navbar-item"><a href="" class="navbar-link">Admin Login</a></li>
    </ul>
  </div>
  </nav>
  <div class="section landing">
    <div class="container">
      <div class="row">
        <div class="ten columns intro">
          <h1>Welcome to <span>Ahavah</span></h1>
          <h2>Book an appointment</h2>
          <ul class="contact-list">
            <li class="contact-item">Messenger</li>
            <li class="contact-item">+639209058699</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>
</html>