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

    $MED_ID = $_GET["GIVEN_MED_ID"];
    $query = "DELETE FROM Inventory WHERE MED_ID = '$MED_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../inventory.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
