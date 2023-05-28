<?php
    require_once('config.php');

    $SERVICE_ID = $_GET["SERVICE_ID"];
    $query = "DELETE FROM Indiv_Service WHERE SERVICE_ID = '$SERVICE_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ./admin/indiv.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
