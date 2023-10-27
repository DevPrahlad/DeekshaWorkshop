<?php
session_start();
if (isset($_SESSION['ID'])) {
  header("Location:faculty_panel.php");
  exit();
}
// Include database connectivity

include_once('database.php');

if (isset($_POST['submit'])) {
  $errorMsg = "";
  $username = $con->real_escape_string($_POST['username']);
  $password = $con->real_escape_string($_POST['password']);

  if (!empty($username) || !empty($password)) {
    $query  = "SELECT * FROM admins WHERE username = '$username'";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $_SESSION['ID'] = $row['id'];
      $_SESSION['ROLE'] = $row['role'];
      $_SESSION['NAME'] = $row['name'];
      if ($_SESSION['ROLE'] == 'Admin') {
        header('location:faculty_panel.php');
        die();
      } else {
        header("Location:faculty_panel.php");
        die();
      }
    } else {
      $errorMsg = "No user found on this username";
    }
  } else {
    $errorMsg = "Username and Password is required";
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Deeksha Workshop login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

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
        <form action="" method="POST">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username">
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
</body>

</html>