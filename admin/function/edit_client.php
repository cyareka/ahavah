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

  $GIVEN_CLIENT_ID = $_GET['GIVEN_CLIENT_ID'];
  $NEW_CLIENT_FNAME = $_POST['CLIENT_FNAME'];
  $NEW_CLIENT_LNAME = $_POST['CLIENT_LNAME'];
  $NEW_CLIENT_PNAME = $_POST['CLIENT_PNAME'];
  $NEW_CLIENT_PHONE = $_POST['CLIENT_PHONE'];
  $NEW_CLIENT_MSNGR = $_POST['CLIENT_MSNGR'];

  $sql = "SELECT * FROM Clients WHERE CLIENT_ID ='$GIVEN_CLIENT_ID' ";
  
  $result = $conn->query($sql);

  $sql = "UPDATE Clients SET 
            CLIENT_FNAME='$NEW_CLIENT_FNAME',
            CLIENT_LNAME='$NEW_CLIENT_LNAME', 
            CLIENT_PNAME='$NEW_CLIENT_PNAME',
            CLIENT_PHONE='$NEW_CLIENT_PHONE',
            CLIENT_MSNGR='$NEW_CLIENT_MSNGR' 
          WHERE CLIENT_ID=$GIVEN_CLIENT_ID";

  if ($conn->query($sql) === TRUE) {
      echo "Row updated successfully.";
  } else {
      echo "Error updating row: " . $conn->error;
  }
header("location: ../record_client.php");  
}
?>
