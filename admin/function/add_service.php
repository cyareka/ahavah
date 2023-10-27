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
  $SERVICE_ID = $_POST["SERVICE_ID"];
  $PRICE = $_POST["PRICE"];
  $MED_ID = $_POST["MED_ID"];
  
  $sql = "CALL InsertService(
    '$SERVICE_ID',
    '$PRICE',
    '$MED_ID'
  )";

  if ($conn->query($sql)===TRUE) {echo "Service Information added successfully";} 
  else {echo"Error adding service information: " . $conn->error;}
}

//Close the database connection
$conn->close();
header("location: ../service_all.php");
?>