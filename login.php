<?php
session_start();
error_reporting();
  if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin.php");
    } elseif ($_SESSION['role'] === 'user') {
        header("Location: faculty_panel.php");
    }
    exit();
  }
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Establish a database connection (you should replace these with your actual database credentials)
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'erps';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Securely hash the password (you should use a better hashing algorithm in a production environment)


    // Prepare and execute a query
    $stmt = $conn->prepare("SELECT username, role FROM usersss WHERE username = ? AND password = ? AND role = ?");
    $stmt->bind_param("sss", $username, $password, $role);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($dbUsername, $dbRole);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        // Successful login
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $dbRole;
        if ($dbRole === 'admin') {
            header("Location: admin.php");
        } elseif ($dbRole === 'user') {
            header("Location: faculty_panel.php");
        }
    } else {
        // Invalid credentials
        $errorMessage = "Invalid username, password, or role.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="user-box">
                <input type="text" name="username" placeholder="" required>
                <label>Email</label>
            </div>

            <div class="user-box">
                <input type="password" name="password" placeholder="" required>
                <label>Password</label>
            </div>
            <div class="radio-btn">
                <div>
                    <input type="radio" name="role" value="admin" checked> Admin
                </div>
                <div>
                    <input type="radio" name="role" value="user"> User<br>
                </div>
            </div>

            <div class="submit-btn">
                <a href="#"><span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Submit<?php echo $errorMessage; ?></a>
            </div>
        </form>
    </div>
</body>

</html>