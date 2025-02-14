<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$sql = "SELECT name, photo, mobile FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .id-card {
            width: 300px;
            background: #fff;
            padding: 15px;
            margin: 20px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            text-align: center;
        }
        .id-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #007bff;
        }
        .id-card h2 {
            margin: 10px 0;
            font-size: 20px;
            color: #333;
        }
        .id-card p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>

<h1>Employee ID Cards</h1>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="id-card">';
        echo '<img src="uploads/' . $row["photo"] . '" alt="Profile Photo">';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<p>Mobile: ' . $row["mobile"] . '</p>';
        echo '</div>';
    }
} else {
    echo "<p>No records found</p>";
}

$conn->close();
?>

</body>
</html>
