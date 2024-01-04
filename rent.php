<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION["user_id"];
    $car_id = $_POST["car_id"];

    $check_sql = "SELECT * FROM rentals WHERE UserID='$user_id' AND CarID='$car_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows == 0) {
        $insert_sql = "INSERT INTO rents (UserID, CarID) VALUES ('$user_id', '$car_id')";
        $conn->query($insert_sql);
    }

    $conn->close();
}

header("Location: customerView.php");
?>

