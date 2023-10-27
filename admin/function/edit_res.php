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

  $GIVEN_RES_ID = $_GET['GIVEN_RES_ID'];
  $NEW_APPT_DATE = $_POST['APPT_DATE'];
  $NEW_HAIRD_ID = $_POST['HAIRD_ID'];
  $NEW_CLIENT_ID = $_POST['CLIENT_ID'];
  $NEW_SERVICE_ID = $_POST['SERVICE_ID'];
  $NEW_PAY_ID = $_POST['PAY_ID'];
  
  $sql = "SELECT * FROM Reservations WHERE RES_ID ='$GIVEN_RES_ID' ";
  
  $result = $conn->query($sql);

  $sql = "UPDATE Reservations SET 
            APPT_DATE='$NEW_APPT_DATE',
            HAIRD_ID='$NEW_HAIRD_ID', 
            CLIENT_ID='$NEW_CLIENT_ID',
            SERVICE_ID='$NEW_SERVICE_ID',
            PAY_ID='$NEW_PAY_ID' 
          WHERE RES_ID=$GIVEN_RES_ID";

  if ($conn->query($sql) === TRUE) {
      echo "Row updated successfully.";
  } else {
      echo "Error updating row: " . $conn->error;
  }
header("location: ../reservation.php"); 
}     
?>
