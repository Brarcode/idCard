<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_data"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Query to fetch data
$sql = "SELECT * FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);

// Debugging: Check if query ran successfully
if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Submitted Form Data</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        img { width: 50px; height: auto; border-radius: 5px; }
    </style>
</head>
<body>

<h1>Admin Panel - Submitted Form Data</h1>

<?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Aadhar</th>
            <th>PAN</th>
            <th>Profession</th>
            <th>Salary</th>
            <th>Blood Group</th>
            <th>Photo</th>
            <th>Education</th>
            <th>Skills</th>
            <th>Married</th>
            <th>Gender</th>
            <th>Passport</th>
            <th>Pincode</th>
            <th>Refer By</th>
            <th>Police Case</th>
            <th>Disability</th>
            <th>Terms</th>
            <th>Consent</th>
            <th>Submitted At</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><?php echo $row['email']; ?></td>
                        <td><img src="uploads/<?php echo $row['aadhar_card']; ?>" alt="Photo"></td>
            
                                    <td><img src="uploads/<?php echo $row['pan_card']; ?>" alt="Photo"></td>
            <td><?php echo $row['profession']; ?></td>
            <td><?php echo $row['salary_range']; ?></td>
            <td><?php echo $row['blood_group']; ?></td>
            <td><img src="uploads/<?php echo $row['photo']; ?>" alt="Photo"></td>
            <td><?php echo $row['education']; ?></td>
            <td><?php echo $row['skills']; ?></td>
            <td><?php echo $row['married_status']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['have_passport']; ?></td>
            <td><?php echo $row['pin_code']; ?></td>
            <td><?php echo $row['refer_by']; ?></td>
            <td><?php echo $row['police_case']; ?></td>
            <td><?php echo $row['disability']; ?></td>
            <td><?php echo $row['terms_agree']; ?></td>
            <td><?php echo $row['consent_social_media']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No data found</p>
<?php endif; ?>

</body>
</html>

<?php $conn->close(); ?>
