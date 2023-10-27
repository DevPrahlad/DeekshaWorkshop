<?php
session_start();
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
    $stmt = $conn->prepare("SELECT username, role FROM users WHERE username = ? AND password = ? AND role = ?");
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
</head>
<<<<<<< HEAD
<style>
  body {
    background-image: url("./bgimg.jpg");
    background-size: cover;
    
  }

  .form-design {
    background-color: #fff;
    opacity: .8;
    border: 1px solid black;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    
    text-shadow: 0 0 3px #FF0000;
    
  }
</style>

<body>
  <div class="card text-center" style="padding:20px;">
    <h3>Deeksha Workshop login</h3>
  </div><br>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form class="form-design" action="" method="POST">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="email" class="form-control" name="username" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
          </div>
          <div style="display: flex; justify-content:center; gap:5px;">
            <div>
              <label for="Admin">Admin</label>
              <input type="radio" name="auth">
            </div>
            <div>
              <label for="Faculty">Faculty</label>
              <input type="radio" name="auth">
            </div>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Login">
          </div>
        </form>
      </div>
    </div>
  </div>
=======
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="radio" name="role" value="admin" checked> Admin
        <input type="radio" name="role" value="user"> User<br>
        <input type="submit" value="Login">
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    </form>
>>>>>>> 613318a3c8c118f592668579d1e622da9f5da813
</body>
</html>
