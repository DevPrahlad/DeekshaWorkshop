<?php
session_start();
// Include database connection file
include_once('database.php');
if (!isset($_SESSION['ROLE'])) {
    header("Location:login.php");
    exit();
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
	<title>Admin Panel</title>
</head>
<body>
<div class="sidebar">
    <div class="logo-details">

      <span class="logo_name" style="margin-left:4px">DEEKSHA</span>
    </div>
    <ul class="nav-links">
	<li>
        <a href="admin.php" class="active">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Admin Dasboard</span>
        </a>
      </li>
      <li>
        <a href="adfinish.php">
          <i class='bx bx-book-alt'></i>
          <span class="links_name">Data Report</span>
        </a>
      </li>
      <li>
        <a href="allotment.php" >
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

    <div class="home-content"></div>
<div>
	<h2>Graph Of Task Complited by faculty</h2>
</div>
<div>
	<h2>graph of Task Panding by Faculty</h2>
</div>
<div>
	<h2>Total College Covered</h2>
</div>
<div>
	college Panding
</div>
<div>
	total data Colleted
<div>
	Up
</div>
<div>
	CBSE
</div>
<div>
	ICSE
</div>
</div>
<div>
	<h2>Deprtment wise School students Segregation</h2>
</div>
<div>Year Wise School Student Segregation</div>
<div>
	time Series Analysi
</div>

<div>
	<a href="allotment.php"><button>Allotment</button></a>
</div>
<a class="nav-link" href="logout.php"><?php echo ucwords($_SESSION['ROLE']); ?></a>

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
</body>
</html>