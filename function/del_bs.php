<?php
    require_once('config.php');

    $SERVICE_ID = $_GET["SERVICE_ID"];
    $query = "DELETE FROM Bundled_Service WHERE SERVICE_ID = '$SERVICE_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ./admin/service_bundled.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
