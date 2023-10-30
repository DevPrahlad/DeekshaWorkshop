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
      <form>
        <div class="form-group">
          <label for="photo">Choose Faculty Photo:</label>
          <input type="file" id="photo" name="photo" class="form-control-file" style="width: auto;">
          <div id="photo-preview"></div>


          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Faculty Stream:</label>
                <Select class="form-control">
                  <option>---</option>
                  <option>---</option>
                  <option>---</option>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Faculty Name:</label>
                <Select class="form-control">
                  <option>---</option>
                  <option>---</option>
                  <option>---</option>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">College Region:</label>
                <Select class="form-control">
                  <option>---</option>
                  <option>---</option>
                  <option>---</option>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">College Name:</label>
                <Select class="form-control">
                  <option>---</option>
                  <option>---</option>
                  <option>---</option>
                </select>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Target:</label>
                <input type="text" id="target" name="target" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Target Start Date:</label>
                <input type="date" id="tsdate" name="tsdate" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
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