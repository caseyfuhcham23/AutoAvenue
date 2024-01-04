<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

$valid_criteria = ["Model", "Year", "Price", "Location"];

$search_criteria = $_GET["criteria"] ?? "Model";
$search_value = $_GET["search"] ?? "";

if (!in_array($search_criteria, $valid_criteria)) {
    echo "Invalid search criteria";
    exit();
}

$sql = "SELECT * FROM cars WHERE $search_criteria LIKE '%$search_value%'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - AutoAvenue</title>
    <style>
    body {
        background-color: #f5f5f5;
        color: #333;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #1a1a1a;
        color: #fff;
        padding: 10px;
        text-align: left;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    header h1 {
        margin: 0;
    }

    header img {
        width: 50px;
        margin-right: 10px;
    }

    form {
        margin: 20px 0;
        display: flex;
        align-items: center;
    }

    input, select, button {
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-right: 10px;
    }

    input {
        flex: 1;
    }

    button {
        width: auto;
        background-color: #1a1a1a;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #333;
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
        padding: 20px;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .car:hover {
        transform: scale(1.05);
    }

    .car-content {
        flex: 1;
    }

    .car h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .car p {
        margin: 5px 0;
        color: #666;
    }

    .car-image {
        height: auto;
        max-width: 100%;
        margin-top: 10px;
        border-radius: 5px;
    }

    .add-to-favorites, .remove-listing-button {
        margin-top: 10px;
        padding: 12px;
        width: 100%;
        background-color: #1a1a1a;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .add-to-favorites:hover, .remove-listing-button:hover {
        background-color: #333;
    }

    .customer-view, .add-listing-button {
        margin-top: 10px;
        padding: 12px;
        background-color: #1a1a1a;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .customer-view:hover, .add-listing-button:hover {
        background-color: #333;
    }

    .logout-link {
        display: block;
        margin-top: 20px;
        color: #1a1a1a;
        text-decoration: none;
        font-weight: bold;
        padding: 12px;
        background-color: #fff;
        border: 1px solid #1a1a1a;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s;
    }

    .logout-link:hover {
        background-color: #1a1a1a;
        color: #fff;
    }
</style>

</head>
<body>

<header>
    <img src="./images/logo.jpg" alt="AutoAvenue Logo">
    <h1>AutoAvenue</h1>
    <a href="search.php" class="admin-view">Admin View</a>
</header>

<form action="search.php" method="get">
    <select name="criteria">
        <option value="Model" <?php echo ($search_criteria == 'Model') ? 'selected' : ''; ?>>Model</option>
        <option value="Year" <?php echo ($search_criteria == 'Year') ? 'selected' : ''; ?>>Year</option>
        <option value="Price" <?php echo ($search_criteria == 'Price') ? 'selected' : ''; ?>>Price</option>
        <option value="Location" <?php echo ($search_criteria == 'Location') ? 'selected' : ''; ?>>Location</option>
    </select>
    <input type="text" name="search" placeholder="Search by <?php echo $search_criteria; ?>" value="<?php echo $search_value; ?>">
    <button type="submit">Search</button>
</form>

<form action='favourites.php' method='get'>
    <button type='submit' class='favorites-button'>View Favorites</button>
</form>

<div class='car-grid'>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<div class='car'>";
        echo "<div class='car-content'>";
        echo "<h3>{$row['Model']}</h3>";
        echo "<p>Year: {$row['Year']}</p>";
        echo "<p>Price: {$row['Price']}</p>";
        echo "<p>Location: {$row['Location']}</p>";
        echo "</div>";

        echo "<img src='images/{$row['Image']}' alt='Car Image' class='car-image'>";

        echo "<form action='addFavourites.php' method='post'>";
        echo "<input type='hidden' name='car_id' value='{$row['CarID']}'>";
        echo "<button type='submit' class='add-to-favorites'>Add to Favorites</button>";
        echo "</form>";

        echo "<form action='purchase.php' method='post' onsubmit='return showPopup()'>";
        echo "<input type='hidden' name='car_id' value='{$row['CarID']}'>";
        echo "<button type='submit' class='purchase'>Make demand to purchase</button>";
        echo "</form>";
        echo "<script>";
        echo "function showPopup() {";
        echo "   alert('Demand in progress');";
        echo "   return true;";
        echo "}";
        echo "</script>";

        echo "<form action='rent.php' method='post' onsubmit='return showRentalForm()'>";
        echo "<input type='hidden' name='car_id' value='{$row['CarID']}'>";
        echo "Rental Start Date: <input type='date' name='rental_start' required><br>";
        echo "Rental End Date: <input type='date' name='rental_end' required><br>";
        echo "<button type='submit' class='rent'>Rent</button>";
        echo "</form>";
        echo "<script>";
        echo "function showRentalForm() {";
        echo "   var startDate = document.getElementsByName('rental_start')[0].value;";
        echo "   var endDate = document.getElementsByName('rental_end')[0].value;";
        echo "   alert('Demand in progress');";
        echo "   return true;";
        echo "}";
        echo "</script>";

        echo "</div>";
    }
    $conn->close();
    ?>
</div>
<a href="logout.php" class="logout-link">Logout</a>
</body>
</html>