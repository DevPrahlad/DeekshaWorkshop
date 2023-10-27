<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

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
      align-items: center;
    }



    .head::before {
      content: "";
      position: relative;
      left: 0;
      bottom: -2px;
      height: 3px;
      width: 50px;
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
        <a href="faculty_panel.php" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Faculty Panel</span>
        </a>
      </li>

      <li>
        <a href="usfinish.php">
          <i class='bx bx-book-alt'></i>
          <span class="links_name">Finished Task</span>
        </a>
      </li>
      <li>
        <a href="pending.php">
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
        <span class="dashboard">Faculty Panel</span>
      </div>
    </nav>

    <div class="home-content">

      <form>
        <div class="form-group">

          <div id="photo-preview"></div>


          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Faculty Name:</label>
                <input type="text" id="name" name="name" class="form-control">
              </div>
            </div>



            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Department:</label>
                <Select class="form-control">
                  <option>---</option>
                  <option>---</option>
                  <option>---</option>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Alloted Schools:</label>
                <Select class="form-control">
                  <option>---</option>
                  <option>---</option>
                  <option>---</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="name">Target:</label>
                <input type="text" id="target" name="target" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">


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