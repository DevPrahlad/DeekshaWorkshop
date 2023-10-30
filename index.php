<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$errorMessage = '';
$successMessage = ''; // Initialize the $successMessage variable

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
        $stmt->bind_param("sss", $username, $password, $role);

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
    <link rel="stylesheet" href="style.css">
    <style>
        .main {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100%;
        }

        .form {
            border: 1px solid grey;
            height: 400px;
            width: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h2 {
            font-size: 50px;
            font-weight: 800;
            margin-bottom: 30;
        }

        .form-group {}
    </style>
</head>

<body>
    <div class="main">
        <div class="form">
            <h2>Registration</h2>
            <form class="form-group" method="POST" action="">
                <input type="radio" name="role" value="admin" checked> Admin
                <input type="radio" name="role" value="user"> User<br>
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>

                <input type="submit" value="Register">
                <p style="color: red;"><?php echo $errorMessage; ?></p>
                <p style="color: green;"><?php echo $successMessage; ?></p>
            </form>
            <p>Already have an account? <a href="index.php">Login</a></p>
        </div>
    </div>

</body>

</html>