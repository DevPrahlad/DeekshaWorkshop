<?php
// Include the database connection
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from the form
    $loggedInUserId = $_POST['user_id'];

    // Get the rest of the form data
     // Temporary path to uploaded photo
    $department = $_POST['facstream'];
    $name = $_POST['facname'];
    $regionId = $_POST['region'];
    $schools = implode(', ', $_POST['schools']);
    $target = $_POST['target'];
    $tsdate = $_POST['tsdate'];
    $tedate = $_POST['tedate'];

    // Move the uploaded photo to a permanent location
   
    // Insert the form data into the MySQL table, including the user ID
    $sql = "INSERT INTO faculty_data (user_id,department, name, region_id, schools, target, tsdate, tedate)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("issisiss", $loggedInUserId, $department, $name, $regionId, $schools, $target, $tsdate, $tedate);

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
} else {
    echo "Invalid request method.";
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style1.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">

      <span class="logo_name" style="margin-left:4px">DEEKSHA</span>
    </div>
    <ul class="nav-links">
    <li>
        <a href="admin.php" >
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Admin Dasboard</span>
        </a>
      </li>
      <li>
        <a href="admin_data_report.php">
          <i class='bx bx-book-alt'></i>
          <span class="links_name">Data Report</span>
        </a>
      </li>
      <li>
        <a href="allotment.php" class="active" >
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Allotment</span>
        </a>
      </li>
     
     
      <li>
        <a href="search-vehicle.php">
          <i class='bx bx-search'></i>
          <span class="links_name">Search</span>
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
        <span class="dashboard">Deeksha Workshop Details</span>
      </div>
    </nav>

    <div class="home-content">
	 <?php
        include 'database.php'; // Include the database connection

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Query to fetch a specific user's data
            $sql = "SELECT * FROM usersss WHERE id = $id";
            $result = $con->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
        ?>
      <form action="" method="POST">
        <div class="form-group">
          <label for="photo">Choose Faculty Photo:</label>
          <input type="file" id="photo" name="photo" class="form-control-file" style="width: auto;">
		     <input type="hidden" name="user_id" value="<?php echo $id; ?>">

          <div id="photo-preview">
		  <img src="bg-login.png" width="200" height="200">
		  </div>


          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Faculty Stream:</label>
               <input type="text" id="facstream" name="facstream" value="<?php  echo $row['department'];?>" class="form-control"readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Faculty Name:</label>
               <input type="text" id="facname" name="facname" value="<?php  echo $row['name'];?>" class="form-control" readonly>
              </div>
            </div>
<?php
// Database connection setup
$host = "localhost";
$username = "root";
$password = "";
$database = "erps";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve regions from the database
$region_query = "SELECT * FROM regions";
$region_result = $conn->query($region_query);
?>
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">College Region:</label>
                <Select class="form-control" name="region" id="region">
				<option value="">--Select Region--</option>
                  <?php
    while ($row = $region_result->fetch_assoc()) {
        echo "<option value='" . $row['region_id'] . "'>" . $row['region_name'] . "</option>";
    }
    ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="name" >College Name:</label>
                <Select class="form-control" name="schools[]" id="school" multiple onchange="updateTarget()"> 
				 </select>
              </div>
            </div>
			<div class="col-md-6">
              <div class="form-group">
                <label for="name">Targeted schools:</label>
             <select id="selectedSchools" name="selectedSchools[]" class="form-control" multiple>
			 </select>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Target:</label>
                <input type="text" id="target" name="target" class="form-control">
              </div>
            </div>
  

            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Target Start Date:</label>
                <input type="date" id="tsdate" name="tsdate" class="form-control">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="email">Target End Date:</label>
                <input type="date" id="tedate" name="tedate" class="form-control">
              </div>
            </div>

          </div>
        </div>
        <input type="submit" value="Submit" class="btn">
      </form>

        <?php
            } else {
                echo "User not found.";
            }
        } else {
            echo "Invalid user ID.";
        }

        $con->close();
        ?>
    </div>

  </section>
  <script>
function updateTarget() {
    var selectedSchools = document.getElementById('school').selectedOptions;
    var selectedSchoolsDropdown = document.getElementById('selectedSchools');
    var target = document.getElementById('target');

    // Remove existing options in the selectedSchoolsDropdown
    while (selectedSchoolsDropdown.options.length > 0) {
        selectedSchoolsDropdown.remove(0);
    }

    // Initialize an array to store selected school names
    var selectedSchoolNames = [];

    // Loop through selected options to collect names
    for (var i = 0; i < selectedSchools.length; i++) {
        selectedSchoolNames.push(selectedSchools[i].text);

        // Create new options for the selectedSchoolsDropdown
        var option = document.createElement("option");
        option.text = selectedSchools[i].text;
        option.value = selectedSchools[i].value;
        selectedSchoolsDropdown.add(option);
    }

    // Update the "Target" textbox with the count of selected schools
    target.value = selectedSchools.length;
}
</script>


  <script>
    document.getElementById('region').addEventListener('change', function () {
        var regionId = this.value;
        var schoolDropdown = document.getElementById('school');

        // Clear existing options
        schoolDropdown.innerHTML = "<option value=''>--Select School--</option>";

        if (regionId) {
            // Fetch schools based on the selected region
            <?php
            $school_query = "SELECT school_name FROM schools WHERE region_id = ?";
            $stmt = $conn->prepare($school_query);
            $stmt->bind_param("i", $region_id);
            ?>

            fetchSchools(regionId);
        }
    });

    function fetchSchools(regionId) {
        var schoolDropdown = document.getElementById('school');
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_schools.php?region_id=' + regionId, true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var schools = JSON.parse(xhr.responseText);

                schools.forEach(function (school) {
                    schoolDropdown.innerHTML += "<option value='" + school.school_name + "'>" + school.school_name + "</option>";
                });
            }
        };

        xhr.send();
    }
</script>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

  <script>
    document.getElementById('photo').addEventListener('change', function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
        var imgSrc = e.target.result;
        document.getElementById('photo-preview').innerHTML = '<img src="' + imgSrc + '" width="200" height="200">';
      }

      reader.readAsDataURL(file);
    });
  </script>
</body>

</html>