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
  $NEW_PRICE = $_POST['PRICE'];
  $NEW_MED_ID = $_POST['MED_ID'];

  $sql = "SELECT * FROM Services WHERE MED_ID ='$GIVEN_SERVICE_ID' ";
  
  $result = $conn->query($sql);

  $sql = "UPDATE Services SET 
            PRICE='$NEW_PRICE',
            MED_ID='$NEW_MED_ID'
          WHERE SERVICE_ID=$GIVEN_SERVICE_ID";

  if ($conn->query($sql) === TRUE) {
      echo "Row updated successfully.";
  } else {
      echo "Error updating row: " . $conn->error;
  }
header("location: ../service_all.php"); 
}      
?>
