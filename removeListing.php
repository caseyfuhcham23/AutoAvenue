<?php

include 'dbconfig.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $carID = $_POST["car_id"];

    $sql = "DELETE FROM cars WHERE CarID = $carID";
    if ($conn->query($sql) === TRUE) {
        echo "Listing removed successfully";
    } else {
        echo "Error removing listing: " . $conn->error;
    }
}

header("Location: search.php");

$conn->close();
?>
