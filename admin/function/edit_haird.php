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

  $GIVEN_HAIRD_ID = $_GET['GIVEN_HAIRD_ID'];
  $NEW_HAIRD_FNAME = $_POST['HAIRD_FNAME'];
  $NEW_HAIRD_LNAME = $_POST['HAIRD_LNAME'];
  $NEW_HAIRD_PHONE = $_POST['HAIRD_PHONE'];
  $NEW_HAIRD_MSNGR = $_POST['HAIRD_MSNGR'];

  $sql = "SELECT * FROM Hairdressers WHERE HAIRD_ID ='$GIVEN_HAIRD_ID' ";
  
  $result = $conn->query($sql);

  $sql = "UPDATE Hairdressers SET 
            HAIRD_FNAME='$NEW_HAIRD_FNAME',
            HAIRD_LNAME='$NEW_HAIRD_LNAME', 
            HAIRD_PHONE='$NEW_HAIRD_PHONE',
            HAIRD_MSNGR='$NEW_HAIRD_MSNGR' 
          WHERE HAIRD_ID=$GIVEN_HAIRD_ID";

  if ($conn->query($sql) === TRUE) {
      echo "Row updated successfully.";
  } else {
      echo "Error updating row: " . $conn->error;
  }
header("location: ../record_haird.php"); 
}  
?>
