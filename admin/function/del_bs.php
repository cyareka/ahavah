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

    $SERVICE_ID = $_GET["GIVEN_SERVICE_ID"];
    $query = "DELETE FROM Bundled_Services WHERE SERVICE_ID = '$SERVICE_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../service_bundled.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
