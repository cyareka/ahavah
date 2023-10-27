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
  $MED_TYPE = $_POST["MED_TYPE"];
  $QUANTITY = $_POST["QUANTITY"];
  $SOURCE_LOCATION = $_POST["SOURCE_LOCATION"];
  $SUPPLIER_NAME = $_POST["SUPPLIER_NAME"];
  $SUPPLIER_PHONE = $_POST["SUPPLIER_PHONE"];
  $BATCH_NO = $_POST["BATCH_NO"];

  $sql = "CALL InsertMed(
    '$MED_TYPE',
    '$QUANTITY',
    '$SOURCE_LOCATION',
    '$SUPPLIER_NAME',
    '$SUPPLIER_PHONE',
    '$BATCH_NO'
  )";

  if ($conn->query($sql)===TRUE) {echo "Medicine added to inventory successfully";} 
  else {echo"Error adding medicine to inventory: " . $conn->error;}
}

//Close the database connection
$conn->close();
header("location: ../inventory.php");
?>