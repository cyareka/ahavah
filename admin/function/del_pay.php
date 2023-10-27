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

    $PAY_ID = $_GET["GIVEN_PAY_ID"];
    $query = "DELETE FROM Payments WHERE PAY_ID = '$PAY_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ../payment.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
