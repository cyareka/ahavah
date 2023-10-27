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

  $GIVEN_PAY_ID = $_GET['GIVEN_PAY_ID'];
  $NEW_AMOUNT = $_POST['AMOUNT'];
  $NEW_PAY_TYPE = $_POST['PAY_TYPE'];
  $NEW_PAY_RECEIPT = $_FILES['PAY_RECEIPT'];
  $NEW_PAY_STATUS = $_POST['PAY_STATUS'];

  if (isset($_FILES['PAY_RECEIPT']) && $_FILES['PAY_RECEIPT']['error'] === UPLOAD_ERR_OK) {
      $file = $_FILES['PAY_RECEIPT'];

      $allowedExtensions = ['jpg', 'jpeg', 'png'];
      $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

      if (in_array($fileExtension, $allowedExtensions)) {
          // Validate file size
          $maxFileSize = 2 * 1024 * 1024; // Maximum file size in bytes (2MB)
          if ($file['size'] <= $maxFileSize) {
              $fileName = uniqid() . '.' . $fileExtension;
              $filePath = './receipts/' . $fileName;

              if (move_uploaded_file($file['tmp_name'], $filePath)) {
                  $NEW_PAY_RECEIPT = $fileName;

                  $sql = "SELECT * FROM Payments WHERE PAY_ID ='$GIVEN_PAY_ID' ";
                  
                  $result = $conn->query($sql);

                  $sql = "UPDATE Payments SET 
                            AMOUNT='$NEW_AMOUNT',
                            PAY_TYPE='$NEW_PAY_TYPE',
                            PAY_RECEIPT='$NEW_PAY_RECEIPT',
                            PAY_STATUS='$NEW_PAY_STATUS'
                          WHERE PAY_ID=$GIVEN_PAY_ID";

                  if ($conn->query($sql) === TRUE) {
                      echo "Row updated successfully.";
                  } else {
                      echo "Error updating row: " . $conn->error;
                  }

              } else {
                  echo "Error moving the uploaded file.";
              }
          } else {
              echo "File size exceeds the allowed limit.";
          }
      } else {
          echo "Invalid file type. Only JPG, JPEG, and PNG files are allowed.";
      }
  } else {
      echo "No file was uploaded or an error occurred during upload.";
  }
header("location: ../payment.php");  
}
?>
