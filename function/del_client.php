<?php
    require_once('config.php');

    $CLIENT_ID = $_GET["CLIENT_ID"];
    $query = "DELETE FROM Clients WHERE CLIENT_ID = '$CLIENT_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ./admin/record_client.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
