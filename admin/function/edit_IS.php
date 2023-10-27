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
  $NEW_IS_NAME = $_POST['IS_NAME'];
  $NEW_IS_DESC = $_POST['IS_DESC'];

  $sql = "SELECT * FROM Indiv_Services WHERE SERVICE_ID ='$GIVEN_SERVICE_ID' ";
  
  $result = $conn->query($sql);

  $sql = "UPDATE Indiv_Services SET 
            IS_NAME='$NEW_IS_NAME',
            IS_DESC='$NEW_IS_DESC'
          WHERE SERVICE_ID=$GIVEN_SERVICE_ID";

  if ($conn->query($sql) === TRUE) {
      echo "Row updated successfully.";
  } else {
      echo "Error updating row: " . $conn->error;
  }
header("location: ../service_indiv.php"); 
}
?>
