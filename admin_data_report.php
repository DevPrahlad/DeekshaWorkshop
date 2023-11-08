<?php
include('database.php'); // Include the database connection

// Check if the user is logged in or authorized (you can use your authentication logic here)
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Redirect to the login page if not logged in or not authorized
    exit();
}



// Query to retrieve the unique names from the faculty_data table (modify the column name as needed)
$sql = "SELECT DISTINCT name ,user_id FROM faculty_fill_data ";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<<<<<<< HEAD
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style1.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .form-group {
      margin: 15px;
    }

    .head {
      position: relative;
      font-size: 30px;
      font-weight: 600;
      color: #333;
      margin: 15px;
    }

    .head::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: -2px;
      height: 3px;
      width: 147px;
      border-radius: 8px;
      background-color: #4070f4;
    }

    .btn {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 45px;
      max-width: 200px;
      width: 100%;
      border: none;
      outline: none;
      color: #fff;
      border-radius: 5px;
      margin: 25px 10px;
      background-color: #4070f4;
      transition: all 0.3s linear;
      cursor: pointer;
    }

    #photo-upload {
      width: 200px;
      height: 200px;
    }

    #photo-preview {
      width: 200px;
      height: 200px;
      border: 1px solid black;
      margin-top: 10px;
    }
  </style>
=======
    <title>View Persons</title>
>>>>>>> 75c3187881f154d676af5e248310f1991b71a622
</head>
<body>
    <h1>View Persons</h1>

<<<<<<< HEAD
      <span class="logo_name" style="margin-left:4px">DEEKSHA</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="admin.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Admin Dasboard</span>
        </a>
      </li>
      <li>
        <a href="admin_data_report.php" class="active">
          <i class='bx bx-book-alt'></i>
          <span class="links_name">Data Report</span>
        </a>
      </li>
      <li>
        <a href="allotment.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Allotment</span>
        </a>
      </li>

      <li class="log_out">
        <a href="logout.php">
          <i class='bx bx-log-out bx-fade-left-hover'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Data Report</span>
      </div>
    </nav>

    <div class="home-content">
      <form>
        <div class="form-group">

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Date:</label>
                <input type="date" id="date" name="date" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">College:</label>
                <input type="text" id="college" name="college" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Loaction:</label>
                <input type="text" id="loaction" name="Location" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Principal Name:</label>
                <input type="text" id="pname" name="pnme" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Principal's Contact No.:</label>
                <input type="text" id="pcont" name="pcont" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">TGT Teacher Name:</label>
                <input type="text" id="tgtname" name="tgtname" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">TGT Teacher's Contact No.:</label>
                <input type="text" id="tgtcont" name="tgtcont" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">PGT Teacher Name:</label>
                <input type="text" id="pgtname" name="pgtname" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">PGT Teacher's Contact No.:</label>
                <input type="text" id="pgtcont" name="pgtcont" class="form-control">
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name">School Status:</label>
                <Select class="form-control">
                  <option>U.P. BOARD</option>
                  <option>CBSE Board</option>
                  <option>ICSE Board</option>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">No. Of 10th Students:</label>
                <input type="text" id="ten" name="ten" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">No. Of 12th Students:</label>
                <input type="text" id="twelve" name="twelve" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Topic Covered:</label>
                <input type="text" id="topic" name="topic" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Visit Remarks:</label>
                <input type="text" id="visistremark" name="visitremark" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Data Collected:</label>
                <Select class="form-control">
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
            </div>


          </div>
        </div>

        <input type="submit" value="Submit" class="btn">
      </form>

    </div>

  </section>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
=======
    <?php
    // Check if there are unique names to display
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display names in cards with a "View" button
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<h2>Person Name: " . $row["name"] . "</h2>";
			 echo "<h2>User Id: " . $row["user_id"] . "</h2>";
            echo "<a href='dummy3.php?user_id=" . $row['user_id'] . "'>View</a>";
            echo "</div>";
        }
    } else {
        echo "No persons found.";
>>>>>>> 75c3187881f154d676af5e248310f1991b71a622
    }
    ?>

    <!-- Add a link to go back to the previous page if needed -->
    <a href="display_data.php">Go Back</a>
</body>
</html>
