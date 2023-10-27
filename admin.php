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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
</head>
<body>
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
</body>
</html>