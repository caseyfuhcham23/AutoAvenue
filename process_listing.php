<?php
include 'dbconfig.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $model = $_POST["model"];
    $year = $_POST["year"];
    $price = $_POST["price"];
    $location = $_POST["location"];

    $imagePath = isset($_FILES["image"]) ? uploadImage($_FILES["image"]) : null;

    $sql = "INSERT INTO cars (Model, Year, Price, Location, Image) VALUES ('$model', $year, $price, '$location', '$imagePath')";

    if ($conn->query($sql) === TRUE) {
        echo "Listing added successfully";
        echo "<a href='search.php'>View Listing</a>";
    } else {
        echo "Error adding listing: " . $conn->error;
    }
}

$conn->close();

function uploadImage($file)
{
    if ($file["error"] !== UPLOAD_ERR_OK) {
        return null;
    }
    
    $targetDirectory = "AutoAvenue/"; 
    $targetFile = $targetDirectory . basename($file["name"]);
    
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (getimagesize($file["tmp_name"]) === false) {
        echo "File is not an image.";
        exit();
    }
    
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        exit();
    }
    
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        echo "Error uploading file.";
        exit();
    }

}
?>

