<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $aadhar_card = $_FILES["aadhar_card"]["name"];
    $pan_card = $_FILES["pan_card"]["name"];
    $profession = $_POST["profession"];
    $salary_range = $_POST["salary_range"];
    $blood_group = $_POST["blood_group"];
    $photo = $_FILES["photo"]["name"];
    $education = $_POST["education"];
    $skills = $_POST["skills"];
    $married_status = $_POST["married_status"];
    $gender = $_POST["gender"];
    $have_passport = $_POST["have_passport"];
    $pin_code = $_POST["pin_code"];
    $refer_by = $_POST["refer_by"];
    $police_case = $_POST["police_case"];
    $disability = $_POST["disability"];
    $terms_agree = isset($_POST["terms_agree"]) ? "Yes" : "No";
    $consent_social_media = isset($_POST["consent_social_media"]) ? "Yes" : "No";

    // File Upload
    $uploadDir = "uploads/";
    move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], $uploadDir . $aadhar_card);
    move_uploaded_file($_FILES["pan_card"]["tmp_name"], $uploadDir . $pan_card);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadDir . $photo);

    // Insert into database
    $sql = "INSERT INTO users (name, mobile, email, aadhar_card, pan_card, profession, salary_range, blood_group, photo, education, skills, married_status, gender, have_passport, pin_code, refer_by, police_case, disability, terms_agree, consent_social_media) 
            VALUES ('$name', '$mobile', '$email', '$aadhar_card', '$pan_card', '$profession', '$salary_range', '$blood_group', '$photo', '$education', '$skills', '$married_status', '$gender', '$have_passport', '$pin_code', '$refer_by', '$police_case', '$disability', '$terms_agree', '$consent_social_media')";

    if ($conn->query($sql) === TRUE) {
        header("Location: thank_you.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
     <h1>ਮਜ਼ਦੂਰ ਕਿਸਾਨ ਲੋਕ ਲਹਿਰ ਰਜਿਸਟਰਡ</h1>
     <h2>Registration Form</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="name" >

            <label>Mobile Number:</label>
            <input type="text" name="mobile" >

            <label>Email:</label>
            <input type="email" name="email" >

            <label>Aadhar Card:</label>
            <input type="file" name="aadhar_card" >

            <label>PAN Card:</label>
            <input type="file" name="pan_card" >

            <label>Profession:</label>
            <input type="text" name="profession" >

            <label>Salary Range:</label>
            <select name="salary_range">
                <option value="0-5">0-5 Lakhs</option>
                <option value="5-10">5-10 Lakhs</option>
                <option value="12+">12+ Lakhs</option>
            </select>

            <label>Blood Group:</label>
            <input type="text" name="blood_group" >

            <label>Photo:</label>
            <input type="file" name="photo" >

            <label>Education:</label>
            <textarea name="education" ></textarea>

            <label>Skills:</label>
            <textarea name="skills" ></textarea>

            <label>Married Status:</label>
            <select name="married_status">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
            </select>

            <label>Gender:</label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label>Have Passport?</label>
            <select name="have_passport">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <label>Pin Code:</label>
            <input type="text" name="pin_code" >

            <label>Referred By:</label>
            <input type="text" name="refer_by">

            <label>Any Police Case?</label>
            <select name="police_case">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <label>Disability:</label>
            <select name="disability">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <input type="checkbox" name="terms_agree" > I agree to the Terms and Conditions<br>
            <input type="checkbox" name="consent_social_media"> Consent to upload photo on social media<br>

            <button type="submit">Submit</button>
        </form>
    </div>

    <style type="text/css">
        body {
    font-family: Arial, sans-serif;
    background: #f2f2f2;
}
.container {
    width: 50%;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
}
input, select, textarea {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
}
button {
    background: #28a745;
    color: white;
    padding: 10px;
    border: none;
}

    </style>
</body>
</html>
