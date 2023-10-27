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

    $RES_ID = $_GET["GIVEN_RES_ID"];
    $query = "DELETE FROM Reservations WHERE RES_ID = '$RES_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../reservation.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
