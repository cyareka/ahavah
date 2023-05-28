<?php
    require_once('config.php');

    $MED_ID = $_GET["MED_ID"];
    $query = "DELETE FROM Inventory WHERE MED_ID = '$MED_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ./admin/inventory.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
