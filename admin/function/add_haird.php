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
  $HAIRD_FNAME = $_POST["HAIRD_FNAME"];
  $HAIRD_LNAME = $_POST["HAIRD_LNAME"];
  $HAIRD_PHONE = $_POST["HAIRD_PHONE"];
  $HAIRD_MSNGR = $_POST["HAIRD_MSNGR"];

  $sql = "CALL InsertHairD(
    '$HAIRD_FNAME',
    '$HAIRD_LNAME', 
    '$HAIRD_PHONE', 
    '$HAIRD_MSNGR'
  )";

  if ($conn->query($sql)===TRUE) {echo "Hairdresser added successfully";} 
  else {echo"Error adding hairdresser: " . $conn->error;}
}

//Close the database connection
$conn->close();
header("location: ../record_haird.php");
?>