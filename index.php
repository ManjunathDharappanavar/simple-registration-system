<?php
// Database connection details from InfinityFree
$host = "sqlXXX.infinityfree.com"; // Replace with your actual host
$user = "if0_38565634"; // Replace with your actual username
$pass = "manjuanth"; // Replace with your actual password
$dbname = "if0_38565634_logindb"; // Replace with your actual database name

// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


// Insert user data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // For security, we will hash it before storing

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and insert data into the database
    $sql = "INSERT INTO user_info (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('User registered successfully!')</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        die();
    } else {
        echo "<script>alert('Error:  . $stmt->error');</script>";
    }
}
?>

<html>
    <head>
        <title>register page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
<div class="form-div">
<form method="POST" class="myform">
<h1>Register Here</h1>
            <input type="text" name="username" placeholder="enter username" 
            class="name" required>
            <input type="password" name="password" placeholder="enter password" 
            class="pass" required>
            <button type="submit" class="reg-btn">Register</button>
        </form>
</div>
    </body>
</html>
