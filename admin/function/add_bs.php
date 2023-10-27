<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Ahavah_DB";
$port = "3308";

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["add"])) {
  $BS_NAME = $_POST["BS_NAME"];
  $BS_DESC = $_POST["BS_DESC"];

  $sql = "CALL InsertBS(
    '$BS_NAME',
    '$BS_DESC'
  )";

  if ($conn->query($sql)===TRUE) {echo "Bundled Service added successfully";} 
  else {echo"Error adding bundled service: " . $conn->error;}
}

//Close the database connection
$conn->close();
header("location: ../service_bundled.php");
?>