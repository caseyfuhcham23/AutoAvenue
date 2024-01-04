<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT cars.* FROM cars INNER JOIN favourites ON cars.CarID = favourites.CarID WHERE favourites.UserID='$user_id'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - AutoAvenue</title>
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #1a1a1a;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        .car-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .car {
            position: relative;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 10px;
            display: flex;
            flex-direction: column;
        }

        .car-content {
            flex: 1;
        }

        .car-image {
            height: auto;
            max-width: 50%;
            margin-left: 5px;
        }

        form {
            margin-top: 10px;
        }

        button {
            padding: 8px;
            background-color: #1a1a1a;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #1a1a1a;
            text-decoration: none;
            font-weight: bold;
            padding: 8px;
            background-color: #fff;
            border: 1px solid #1a1a1a;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #1a1a1a;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>AutoAvenue - Favorites</h1>

    <div class='car-grid'>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<div class='car'>";
            echo "<h3>{$row['Model']}</h3>";
            echo "<p>Year: {$row['Year']}</p>";
            echo "<p>Price: {$row['Price']}</p>";
            echo "<p>Location: {$row['Location']}</p>";

            echo "<img src='images/{$row['Image']}' alt='Car Image' class='car-image'>";

            echo "<form action='removeFavourites.php' method='post'>";
            echo "<input type='hidden' name='car_id' value='{$row['CarID']}'>";
            echo "<button type='submit'>Remove from Favorites</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>
    <a href="search.php">Back to Search</a>
    <a href="logout.php">Logout</a>
</body>
</html>