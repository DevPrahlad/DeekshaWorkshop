<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validate and sanitize user inputs
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    // Check if the username is already taken (you should implement this)
    $isUsernameTaken = false; // Replace with actual logic to check if the username exists in your database

    if ($isUsernameTaken) {
        $errorMessage = "Username already taken. Please choose another.";
    } else {
        // Hash the password securely (use a better hashing algorithm in production)
        $hashedPassword = md5($password);

        // Store the registration data in the database (replace with your database connection logic)
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'erps';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashedPassword, $role);

        if ($stmt->execute()) {
            $successMessage = "Registration successful. You can now log in.";
        } else {
            $errorMessage = "Registration failed. Please try again.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="radio" name="role" value="admin" checked> Admin
        <input type="radio" name="role" value="user"> User<br>
        <input type="submit" value="Register">
        <p style="color: red;"><?php echo $errorMessage; ?></p>
        <p style="color: green;"><?php echo $successMessage; ?></p>
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
</body>
</html>
