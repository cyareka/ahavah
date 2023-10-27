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

  $GIVEN_MED_ID = $_GET['GIVEN_MED_ID'];
  $NEW_MED_TYPE = $_POST['MED_TYPE'];
  $NEW_QUANTITY = $_POST['QUANTITY'];
  $NEW_SOURCE_LOCATION = $_POST['SOURCE_LOCATION'];
  $NEW_SUPPLIER_NAME = $_POST['SUPPLIER_NAME'];
  $NEW_SUPPLIER_PHONE = $_POST['SUPPLIER_PHONE'];
  $NEW_BATCH_NO = $_POST['BATCH_NO'];

  $sql = "SELECT * FROM Inventory WHERE MED_ID ='$GIVEN_MED_ID' ";
  
  $result = $conn->query($sql);

  $sql = "UPDATE Inventory SET 
            MED_TYPE='$NEW_MED_TYPE',
            QUANTITY='$NEW_QUANTITY', 
            SOURCE_LOCATION='$NEW_SOURCE_LOCATION',
            SUPPLIER_NAME='$NEW_SUPPLIER_NAME',
            SUPPLIER_PHONE='$NEW_SUPPLIER_PHONE', 
            BATCH_NO='$NEW_BATCH_NO'
          WHERE MED_ID=$GIVEN_MED_ID";

  if ($conn->query($sql) === TRUE) {
      echo "Row updated successfully.";
  } else {
      echo "Error updating row: " . $conn->error;
  }
header("location: ../inventory.php"); 
}     
?>
