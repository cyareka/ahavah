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
  $IS_NAME = $_POST["IS_NAME"];
  $IS_DESC = $_POST["IS_DESC"];

  $sql = "CALL InsertIS(
    '$IS_NAME',
    '$IS_DESC'
  )";

  if ($conn->query($sql)===TRUE) {echo "Individual Service added successfully";} 
  else {echo"Error adding individual service: " . $conn->error;}
}

//Close the database connection
$conn->close();
header("location: ../service_indiv.php");
?>