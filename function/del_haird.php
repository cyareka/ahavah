<?php
    require_once('config.php');

    $HAIRD_ID = $_GET["HAIRD_ID"];
    $query = "DELETE FROM Hairdressers WHERE HAIRD_ID = '$HAIRD_ID'";
    if (mysqli_query($conn, $query)) {
        echo "Successfully deleted.";
        header("location: ./admin/record_haird.php");
    } else {
        echo "Something went wrong. Please try again later.";
    }
?>
