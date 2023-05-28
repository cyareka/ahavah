<?php
    require_once('config.php');

    $PAY_ID = $_GET["PAY_ID"];
    $query = "DELETE FROM Payment WHERE PAY_ID = '$PAY_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ./admin/inventory.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
