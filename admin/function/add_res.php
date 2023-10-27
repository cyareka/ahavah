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
  $HAIRD_ID = $_POST["HAIRD_ID"];
  $CLIENT_ID = $_POST["CLIENT_ID"];
  $SERVICE_ID = $_POST["SERVICE_ID"];
  $PAY_ID = $_POST["PAY_ID"];
  $APPT_DATE = $_POST["APPT_DATE"];

  $sql = "CALL InsertRes(
    '$HAIRD_ID',
    '$CLIENT_ID',
    '$SERVICE_ID',
    '$PAY_ID',
    '$APPT_DATE'
  )";

  if ($conn->query($sql)===TRUE) {echo "Reservation added successfully";} 
  else {echo"Error adding reservation: " . $conn->error;}
}

//Close the database connection
$conn->close();
header("location: ../reservation.php");
?>