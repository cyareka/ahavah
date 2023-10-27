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
    $AMOUNT = $_POST["AMOUNT"];
    $PAY_TYPE = $_POST["PAY_TYPE"];
    $PAY_RECEIPT = $_FILES['PAY_RECEIPT'];
    $PAY_STATUS = $_POST["PAY_STATUS"];

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
                    $PAY_RECEIPT = $fileName;

                    $sql = "CALL InsertPay(
                      '$AMOUNT',
                      '$PAY_TYPE',
                      '$PAY_RECEIPT',
                      '$PAY_STATUS'
                    )";

                    if (mysqli_query($conn, $sql)) {
                        echo "Successfully Added.";
                    } else {
                        echo "Something went wrong. Please try again later.";
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
//Close the database connection
$conn->close();
header("location: ../payment.php");
}
?>