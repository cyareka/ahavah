<?php
    require_once('config.php');

    $RES_ID = $_GET["RES_ID"];
    $query = "DELETE FROM Reservation WHERE RES_ID = '$RES_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ./admin/reservation.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
