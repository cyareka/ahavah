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

    $CLIENT_ID = $_GET["GIVEN_CLIENT_ID"];
    $query = "DELETE FROM Clients WHERE CLIENT_ID = '$CLIENT_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../record_client.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
