<?php
session_start();

require_once('./backend/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db_username = $_POST['username'];
  $db_password = $_POST['password'];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn -> connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM user WHERE username = '$db_username' AND password = '$db_password'";
  $result = $conn -> query($sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
      if (($row['type'] == 'admin')) {
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $row['username'];
      $_SESSION['type'] = $row['type'];
      header('Location: ./admin/reservation.php');
      exit;
    } else {
      echo 'Error executing the query: ' . $conn -> error;
    }
  } else {
    echo 'Account does not exist.';
  }
  $conn -> close();
}
?>