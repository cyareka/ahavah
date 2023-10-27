<?php  
if(isset($_POST['edit'])) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Ahavah_DB";
  $port = "3308";

  $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $GIVEN_SERVICE_ID = $_GET['GIVEN_SERVICE_ID'];
  $NEW_BS_NAME = $_POST['BS_NAME'];
  $NEW_BS_DESC = $_POST['BS_DESC'];

  $sql = "SELECT * FROM Bundled_Services WHERE SERVICE_ID ='$GIVEN_SERVICE_ID' ";
  
  $result = $conn->query($sql);

  $sql = "UPDATE Indiv_Services SET 
            BS_NAME='$NEW_BS_NAME',
            BS_DESC='$NEW_BS_DESC'
          WHERE SERVICE_ID=$GIVEN_SERVICE_ID";

  if ($conn->query($sql) === TRUE) {
      echo "Row updated successfully.";
  } else {
      echo "Error updating row: " . $conn->error;
  }
header("location: ../service_bundled.php");
}
?>
