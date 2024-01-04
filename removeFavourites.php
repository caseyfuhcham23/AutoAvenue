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

    $delete_sql = "DELETE FROM favourites WHERE UserID='$user_id' AND CarID='$car_id'";
    $conn->query($delete_sql);

    $conn->close();
}

header("Location: favourites.php");
?>
