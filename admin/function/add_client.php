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
  $CLIENT_FNAME = $_POST["CLIENT_FNAME"];
  $CLIENT_LNAME = $_POST["CLIENT_LNAME"];
  $CLIENT_PNAME = $_POST["CLIENT_PNAME"];
  $CLIENT_PHONE = $_POST["CLIENT_PHONE"];
  $CLIENT_MSNGR = $_POST["CLIENT_MSNGR"];

  $sql = "CALL InsertClient(
    '$CLIENT_FNAME',
    '$CLIENT_LNAME', 
    '$CLIENT_PNAME', 
    '$CLIENT_PHONE', 
    '$CLIENT_MSNGR'
  )";

  if ($conn->query($sql)===TRUE) {echo "Client added successfully";} 
  else {echo"Error adding client: " . $conn->error;}
}

//Close the database connection
$conn->close();
header("location: ../record_client.php");
?>