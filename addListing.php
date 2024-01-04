<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Listing - AutoAvenue</title>
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
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input, select {
            width: 100%;
            margin-bottom: 10px;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1a1a1a;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

<header>
    <img src="./images/logo.jpg" alt="AutoAvenue Logo">
    <h1>AutoAvenue</h1>
</header>

<form action="process_listing.php" method="post" enctype="multipart/form-data">
    <label for="model">Model:</label>
    <input type="text" id="model" name="model" required>

    <label for="year">Year:</label>
    <input type="number" id="year" name="year" required>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required>

    <label for="image">Image (optional):</label>
    <input type="file" id="image" name="image" accept="image/*">

    <button type="submit">Add Listing</button>
</form>

</body>
</html>