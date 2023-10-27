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

    $HAIRD_ID = $_GET["GIVEN_HAIRD_ID"];
    $query = "DELETE FROM Hairdressers WHERE HAIRD_ID = '$HAIRD_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../record_haird.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
