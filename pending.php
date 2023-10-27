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
        <a href="faculty_panel.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Faculty Panel</span>
        </a>
      </li>

      <li>
        <a href="user_data_fill.php">
          <i class='bx bx-book-alt'></i>
          <span class="links_name">Finished Task</span>
        </a>
      </li>
      <li>
        <a href="pending.php" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Pending Tasks</span>
        </a>
      </li>


      <li>
        <a href="search-vehicle.php">
          <i class='bx bx-search'></i>
          <span class="links_name">Search</span>
        </a>
      </li>
      <li class="log_out">
        <a href="../login.php">
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
        <span class="dashboard">Pending Task</span>
      </div>
    </nav>

    <div class="home-content">



      <form>
        <div class="form-group">

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Remarks:</label>
                <Select class="form-control">
                  <option>---</option>
                  <option>---</option>
                  <option>---</option>
                </select>
              </div>
            </div>


            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Next Attempt For Pending Schools:</label>
                <input type="date" id="next" name="next" class="form-control">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Form Submitted to DG Office:</label>
                <Select class="form-control">
                  <option>Yes</option>
                  <option>No</option>

                </select>
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
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

  <script src="script.js"></script>
</body>

</html>